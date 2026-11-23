<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OpportunityController extends Controller
{
    /**
     * Display all opportunities.
     */
    public function index(Request $request)
    {
        $query = Opportunity::with('organizerProfile')
            ->withCount('opportunitySkills');

        // Search by opportunity title or organizer name.
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('organizerProfile', function ($organizerQuery) use ($search) {
                        $organizerQuery->where(
                            'organization_name',
                            'like',
                            "%{$search}%"
                        );
                    });
            });
        }

        // Filter by category.
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by publication status.
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by verification status.
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

        // Publication statistics.
        $totalOpportunities = Opportunity::count();

        $draftOpportunities = Opportunity::where(
            'status',
            'draft'
        )->count();

        $publishedOpportunities = Opportunity::where(
            'status',
            'published'
        )->count();

        $closedOpportunities = Opportunity::where(
            'status',
            'closed'
        )->count();

        // Verification statistics.
        $pendingOpportunities = Opportunity::where(
            'verification_status',
            'pending'
        )->count();

        $verifiedOpportunities = Opportunity::where(
            'verification_status',
            'verified'
        )->count();

        $rejectedOpportunities = Opportunity::where(
            'verification_status',
            'rejected'
        )->count();

        return view('super-admin.management-opportunity.index', compact(
            'opportunities',
            'totalOpportunities',
            'draftOpportunities',
            'publishedOpportunities',
            'closedOpportunities',
            'pendingOpportunities',
            'verifiedOpportunities',
            'rejectedOpportunities'
        ));
    }

    /**
     * Display opportunity details.
     */
    public function show(Opportunity $opportunity)
    {
        $opportunity->load([
            'organizerProfile.user',
            'opportunitySkills',
            'opportunityPosters',
        ]);

        return view(
            'super-admin.management-opportunity.show',
            compact('opportunity')
        );
    }

    /**
     * Update publication status.
     */
    public function updatePublicationStatus(
        Request $request,
        Opportunity $opportunity
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in(['draft', 'published', 'closed']),
            ],
        ]);

        $opportunity->update([
            'status' => $validated['status'],
        ]);

        return back()->with(
            'success',
            'Opportunity publication status updated successfully.'
        );
    }

    /**
     * Update verification status.
     */
    public function updateVerificationStatus(
        Request $request,
        Opportunity $opportunity
    ) {
        $validated = $request->validate([
            'verification_status' => [
                'required',
                Rule::in(['pending', 'verified', 'rejected']),
            ],
        ]);

        $opportunity->update([
            'verification_status' => $validated['verification_status'],
        ]);

        return back()->with(
            'success',
            'Opportunity verification status updated successfully.'
        );
    }
}
