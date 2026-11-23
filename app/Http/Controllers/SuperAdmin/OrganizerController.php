<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\OrganizerProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrganizerController extends Controller
{
    /**
     * Display all organizer profiles.
     */
    public function index(Request $request)
    {
        $query = OrganizerProfile::with('user')
            ->withCount('opportunities');

        // Search organizers.
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('organization_name', 'like', "%{$search}%")
                    ->orWhere('organization_type', 'like', "%{$search}%")
                    ->orWhere('contact_email', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by verification status.
        if ($request->filled('status')) {
            $query->where(
                'verification_status',
                $request->status
            );
        }

        $organizers = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Organizer statistics.
        $totalOrganizers = OrganizerProfile::count();

        $pendingOrganizers = OrganizerProfile::where(
            'verification_status',
            'pending'
        )->count();

        $verifiedOrganizers = OrganizerProfile::where(
            'verification_status',
            'verified'
        )->count();

        $rejectedOrganizers = OrganizerProfile::where(
            'verification_status',
            'rejected'
        )->count();

        return view('super-admin.management-organizer.index', compact(
            'organizers',
            'totalOrganizers',
            'pendingOrganizers',
            'verifiedOrganizers',
            'rejectedOrganizers'
        ));
    }

    /**
     * Display organizer details.
     */
    public function show(OrganizerProfile $organizer)
    {
        $organizer->load('user')
            ->loadCount('opportunities');

        return view(
            'super-admin.management-organizer.show',
            compact('organizer')
        );
    }

    /**
     * Update organizer verification status.
     */
    public function updateVerification(
        Request $request,
        OrganizerProfile $organizer
    ) {
        $validated = $request->validate([
            'verification_status' => [
                'required',
                Rule::in(['pending', 'verified', 'rejected']),
            ],
        ]);

        $organizer->update([
            'verification_status' => $validated['verification_status'],
        ]);

        return redirect()
            ->back()
            ->with('success', 'Organizer verification status updated successfully.');
    }
}
