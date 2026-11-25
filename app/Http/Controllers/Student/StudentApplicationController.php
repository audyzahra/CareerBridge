<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Opportunity;
use App\Models\Resume;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentApplicationController extends Controller
{
    /**
     * Get the authenticated student's profile.
     */
    private function getStudentProfile(): StudentProfile
    {
        $studentProfile = StudentProfile::where(
            'user_id',
            auth()->id()
        )->first();

        abort_if(
            !$studentProfile,
            403,
            'Student profile not found. Please complete your profile first.'
        );

        return $studentProfile;
    }

    /**
     * Display the student's applications.
     */
    public function index()
    {
        $studentProfile = $this->getStudentProfile();

        $applications = Application::with([
            'opportunity.organizerProfile',
            'resume',
        ])
            ->where('student_profile_id', $studentProfile->id)
            ->latest('applied_at')
            ->paginate(10);

        return view('student.applications.index', compact(
            'applications'
        ));
    }


    /**
     * Display the application form.
     */
    public function create(string $slug)
    {
        $studentProfile = $this->getStudentProfile();

        $opportunity = Opportunity::where('slug', $slug)
            ->where('status', 'published')
            ->where('verification_status', 'verified')
            ->firstOrFail();

        // Check registration period.
        if (
            $opportunity->registration_start &&
            $opportunity->registration_start->isFuture()
        ) {
            return redirect()
                ->route('opportunities.show', $opportunity->slug)
                ->with('error', 'Registration has not started yet.');
        }

        if (
            $opportunity->registration_deadline &&
            $opportunity->registration_deadline->lt(today())
        ) {
            return redirect()
                ->route('opportunities.show', $opportunity->slug)
                ->with('error', 'Registration has already closed.');
        }

        // Check whether the student has already applied.
        $alreadyApplied = Application::where(
            'student_profile_id',
            $studentProfile->id
        )
            ->where('opportunity_id', $opportunity->id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()
                ->route('student.applications')
                ->with('error', 'You have already applied for this opportunity.');
        }

        // Only show resumes belonging to the authenticated student.
        $resumes = Resume::where(
            'student_profile_id',
            $studentProfile->id
        )
            ->latest('uploaded_at')
            ->get();

        return view('student.applications.create', compact(
            'opportunity',
            'resumes'
        ));
    }


    /**
     * Submit an application for an opportunity.
     */
    public function store(Request $request, string $slug)
    {
        $studentProfile = $this->getStudentProfile();

        // Find an opportunity that is published and verified.
        $opportunity = Opportunity::where('slug', $slug)
            ->where('status', 'published')
            ->where('verification_status', 'verified')
            ->firstOrFail();

        // Check registration start date.
        if (
            $opportunity->registration_start &&
            $opportunity->registration_start->isFuture()
        ) {
            return back()->with(
                'error',
                'Registration for this opportunity has not started yet.'
            );
        }

        // Check registration deadline.
        if (
            $opportunity->registration_deadline &&
            $opportunity->registration_deadline->lt(today())
        ) {
            return back()->with(
                'error',
                'Registration for this opportunity has already closed.'
            );
        }

        // Prevent duplicate applications.
        $alreadyApplied = Application::where(
            'student_profile_id',
            $studentProfile->id
        )
            ->where('opportunity_id', $opportunity->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with(
                'error',
                'You have already applied for this opportunity.'
            );
        }

        // Validate application data.
        $validated = $request->validate([
            'resume_id' => [
                'nullable',
                Rule::exists('resumes', 'id')
                    ->where('student_profile_id', $studentProfile->id),
            ],
            'cover_letter' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ], [
            'resume_id.exists' => 'The selected resume is invalid.',
            'cover_letter.max' => 'Cover letter may not exceed 5000 characters.',
        ]);

        // Create application.
        $application = Application::create([
            'student_profile_id' => $studentProfile->id,
            'opportunity_id' => $opportunity->id,
            'resume_id' => $validated['resume_id'] ?? null,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'status' => 'pending',
            'applied_at' => now(),
        ]);

        return redirect()
            ->route('student.applications.show', $application->id)
            ->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display application details.
     */
    public function show(int $id)
    {
        $studentProfile = $this->getStudentProfile();

        $application = Application::with([
            'opportunity.organizerProfile',
            'resume',
        ])
            ->where('student_profile_id', $studentProfile->id)
            ->findOrFail($id);

        return view('student.applications.show', compact(
            'application'
        ));
    }
}
