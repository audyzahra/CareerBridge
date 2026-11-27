<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\OrganizerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OrganizerOpportunityController extends Controller
{
    /**
     * Get the authenticated organizer's profile.
     */
    private function getOrganizerProfile(): OrganizerProfile
    {
        return OrganizerProfile::where('user_id', auth()->id())
            ->firstOrFail();
    }

    /**
     * Display all opportunities belonging to the organizer.
     */
    public function index(Request $request)
    {
        $organizerProfile = $this->getOrganizerProfile();

        $query = Opportunity::where(
            'organizer_profile_id',
            $organizerProfile->id
        );

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Publication status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Verification status filter
        if ($request->filled('verification_status')) {
            $query->where(
                'verification_status',
                $request->verification_status
            );
        }

        $opportunities = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Statistics are independent of active filters.
        $baseQuery = Opportunity::where(
            'organizer_profile_id',
            $organizerProfile->id
        );

        $statistics = [
            'total' => (clone $baseQuery)->count(),

            'published' => (clone $baseQuery)
                ->where('status', 'published')
                ->count(),

            'draft' => (clone $baseQuery)
                ->where('status', 'draft')
                ->count(),

            'closed' => (clone $baseQuery)
                ->where('status', 'closed')
                ->count(),
        ];

        return view('organizer.opportunities.index', compact(
            'opportunities',
            'statistics'
        ));
    }

    /**
     * Show the create opportunity form.
     */
    public function create()
    {
        $this->getOrganizerProfile();

        return view('organizer.opportunities.create');
    }

    /**
     * Store a new opportunity.
     */
    public function store(Request $request)
    {
        $organizerProfile = $this->getOrganizerProfile();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => [
                'required',
                Rule::in([
                    'scholarship',
                    'internship',
                    'competition',
                    'training',
                ]),
            ],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'eligibility' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'registration_start' => ['nullable', 'date'],
            'registration_deadline' => [
                'nullable',
                'date',
                'after_or_equal:registration_start',
            ],
            'registration_url' => [
                'nullable',
                'url',
                'max:2048',
            ],
            'poster_path' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
            'status' => [
                'required',
                Rule::in(['draft', 'published']),
            ],
        ]);

        $validated['organizer_profile_id'] = $organizerProfile->id;

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title']
        );

        // New opportunities must go through verification.
        $validated['verification_status'] = 'pending';

        if ($request->hasFile('poster_path')) {
            $validated['poster_path'] = $request
                ->file('poster_path')
                ->store('opportunities/posters', 'public');
        }

        Opportunity::create($validated);

        return redirect()
            ->route('organizer.opportunities.index')
            ->with('success', 'Opportunity created successfully.');
    }

    /**
     * Show the edit opportunity form.
     */
    public function edit(Opportunity $opportunity)
    {
        $this->authorizeOpportunity($opportunity);

        return view('organizer.opportunities.edit', compact(
            'opportunity'
        ));
    }

    /**
     * Update an existing opportunity.
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        $this->authorizeOpportunity($opportunity);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => [
                'required',
                Rule::in([
                    'scholarship',
                    'internship',
                    'competition',
                    'training',
                ]),
            ],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'eligibility' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'registration_start' => ['nullable', 'date'],
            'registration_deadline' => [
                'nullable',
                'date',
                'after_or_equal:registration_start',
            ],
            'registration_url' => [
                'nullable',
                'url',
                'max:2048',
            ],
            'poster_path' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
            'status' => [
                'required',
                Rule::in(['draft', 'published', 'closed']),
            ],
        ]);

        if ($validated['title'] !== $opportunity->title) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $opportunity->id
            );
        }

        if ($request->hasFile('poster_path')) {
            if ($opportunity->poster_path) {
                Storage::disk('public')->delete(
                    $opportunity->poster_path
                );
            }

            $validated['poster_path'] = $request
                ->file('poster_path')
                ->store('opportunities/posters', 'public');
        } else {
            unset($validated['poster_path']);
        }

        // Keep the existing verification status.
        unset($validated['verification_status']);

        $opportunity->update($validated);

        return redirect()
            ->route('organizer.opportunities.index')
            ->with('success', 'Opportunity updated successfully.');
    }

    /**
     * Delete an opportunity.
     */
    public function destroy(Opportunity $opportunity)
    {
        $this->authorizeOpportunity($opportunity);

        if ($opportunity->poster_path) {
            Storage::disk('public')->delete(
                $opportunity->poster_path
            );
        }

        $opportunity->delete();

        return redirect()
            ->route('organizer.opportunities.index')
            ->with('success', 'Opportunity deleted successfully.');
    }

    /**
     * Ensure the opportunity belongs to the authenticated organizer.
     */
    private function authorizeOpportunity(Opportunity $opportunity): void
    {
        $organizerProfile = $this->getOrganizerProfile();

        abort_unless(
            $opportunity->organizer_profile_id === $organizerProfile->id,
            403,
            'You are not authorized to manage this opportunity.'
        );
    }

    /**
     * Generate a unique opportunity slug.
     */
    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Opportunity::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
