<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Menampilkan profil Student.
     */
    public function index()
    {
        $profile = StudentProfile::firstOrNew([
            'user_id' => auth()->id(),
        ]);

        return view('student.profile.index', compact('profile'));
    }

    /**
     * Menyimpan atau memperbarui profil Student.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'student_id' => ['nullable', 'string', 'max:50'],
            'university' => ['required', 'string', 'max:255'],
            'faculty' => ['nullable', 'string', 'max:255'],
            'major' => ['required', 'string', 'max:255'],
            'semester' => ['nullable', 'integer', 'min:1', 'max:14'],
            'graduation_year' => ['nullable', 'integer', 'min:2020', 'max:2100'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'portfolio_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
        ]);

        StudentProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            $validated
        );

        return redirect()
            ->route('student.profile')
            ->with('success', 'Your profile has been saved successfully.');
    }
}
