<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\OpportunityCategory;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    /**
     * Display public opportunities.
     */
    public function index(Request $request)
    {
        // Ambil kategori aktif dari database.
        $categories = OpportunityCategory::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Query dasar untuk opportunity yang sudah dipublikasikan
        // dan diverifikasi.
        $query = Opportunity::with([
            'organizerProfile',
            'opportunityType',
            'opportunitySkills.skill',
        ])
            ->where('status', 'published')
            ->where('verification_status', 'verified');

        // Search berdasarkan judul, deskripsi, dan organisasi.
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('organizerProfile', function ($org) use ($search) {
                        $org->where(
                            'organization_name',
                            'like',
                            "%{$search}%"
                        );
                    });
            });
        }

        // Filter kategori.
        // Saat ini masih menggunakan kolom category pada tabel opportunities.
        if (
            $request->filled('category') &&
            $request->input('category') !== 'all'
        ) {
            $query->where('category', $request->input('category'));
        }

        // Filter status berdasarkan tanggal deadline.
        if ($request->input('status') === 'open') {
            $query->where(function ($q) {
                $q->whereNull('registration_deadline')
                    ->orWhereDate(
                        'registration_deadline',
                        '>=',
                        now()->toDateString()
                    );
            });
        } elseif ($request->input('status') === 'closed') {
            $query->whereNotNull('registration_deadline')
                ->whereDate(
                    'registration_deadline',
                    '<',
                    now()->toDateString()
                );
        }

        // Sorting.
        if ($request->input('sort') === 'deadline') {
            $query->orderByRaw('registration_deadline IS NULL')
                ->orderBy('registration_deadline');
        } elseif ($request->input('sort') === 'title') {
            $query->orderBy('title');
        } else {
            $query->latest();
        }

        // Hitung jumlah opportunity berdasarkan kategori.
        // Key hasilnya menggunakan slug kategori agar mudah dipakai di Blade.
        $categoryCounts = Opportunity::query()
            ->where('status', 'published')
            ->where('verification_status', 'verified')
            ->selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        // Pagination.
        $opportunities = $query
            ->paginate(9)
            ->withQueryString();

        return view('public.opportunities.index', compact(
            'categories',
            'categoryCounts',
            'opportunities'
        ));
    }

    /**
     * Display opportunity details.
     */
    public function show(string $slug)
    {
        $opportunity = Opportunity::with([
            'organizerProfile',
            'opportunityType',
            'opportunitySkills.skill',
        ])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where('verification_status', 'verified')
            ->firstOrFail();

        return view('public.opportunities.show', compact('opportunity'));
    }
}
