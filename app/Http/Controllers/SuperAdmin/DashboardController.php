<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // User Statistics
        $totalUsers = DB::table('users')->count();

        $totalStudents = DB::table('users')
            ->where('role', 'student')
            ->count();

        $totalOrganizers = DB::table('users')
            ->where('role', 'organizer')
            ->count();

        // Organizer Statistics
        $totalOrganizerProfiles = DB::table('organizer_profiles')->count();

        $pendingOrganizers = DB::table('organizer_profiles')
            ->where('verification_status', 'pending')
            ->count();

        $verifiedOrganizers = DB::table('organizer_profiles')
            ->where('verification_status', 'verified')
            ->count();

        $rejectedOrganizers = DB::table('organizer_profiles')
            ->where('verification_status', 'rejected')
            ->count();

        // Opportunity Statistics
        $totalOpportunities = DB::table('opportunities')->count();

        $publishedOpportunities = DB::table('opportunities')
            ->where('status', 'published')
            ->count();

        $draftOpportunities = DB::table('opportunities')
            ->where('status', 'draft')
            ->count();

        $closedOpportunities = DB::table('opportunities')
            ->where('status', 'closed')
            ->count();

        $pendingOpportunities = DB::table('opportunities')
            ->where('verification_status', 'pending')
            ->count();

        $verifiedOpportunities = DB::table('opportunities')
            ->where('verification_status', 'verified')
            ->count();

        $rejectedOpportunities = DB::table('opportunities')
            ->where('verification_status', 'rejected')
            ->count();

        // Opportunity Categories
        $opportunitiesByCategory = DB::table('opportunities')
            ->select('category', DB::raw('COUNT(*) as total'))
            ->groupBy('category')
            ->orderBy('category')
            ->get();

        // Recent Users
        $recentUsers = DB::table('users')
            ->select(
                'id',
                'name',
                'email',
                'role',
                'created_at'
            )
            ->latest('created_at')
            ->limit(5)
            ->get();

        // Recent Opportunities
        $recentOpportunities = DB::table('opportunities')
            ->join(
                'organizer_profiles',
                'opportunities.organizer_profile_id',
                '=',
                'organizer_profiles.id'
            )
            ->select(
                'opportunities.id',
                'opportunities.title',
                'opportunities.category',
                'opportunities.status',
                'opportunities.verification_status',
                'opportunities.created_at',
                'organizer_profiles.organization_name'
            )
            ->latest('opportunities.created_at')
            ->limit(5)
            ->get();

        return view('super-admin.dashboard', compact(
            'totalUsers',
            'totalStudents',
            'totalOrganizers',
            'totalOrganizerProfiles',
            'pendingOrganizers',
            'verifiedOrganizers',
            'rejectedOrganizers',
            'totalOpportunities',
            'publishedOpportunities',
            'draftOpportunities',
            'closedOpportunities',
            'pendingOpportunities',
            'verifiedOpportunities',
            'rejectedOpportunities',
            'opportunitiesByCategory',
            'recentUsers',
            'recentOpportunities'
        ));
    }
}
