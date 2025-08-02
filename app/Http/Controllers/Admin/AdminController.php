<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CongregationalGroup;
use App\Models\ChurchOrganization;
use App\Models\SpecialEvent;
use App\Models\DiakoniaMember;
use App\Models\Devotional;
use App\Models\ChurchOfficial;
use App\Models\SecretariatItem;
use App\Models\FinancialRecord;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Check admin access
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Access denied. Admin privileges required.');
        }

        $stats = [
            'congregational_groups' => CongregationalGroup::count(),
            'church_organizations' => ChurchOrganization::count(),
            'special_events' => SpecialEvent::count(),
            'diakonia_members' => DiakoniaMember::active()->count(),
            'devotionals' => Devotional::count(),
            'church_officials' => ChurchOfficial::active()->count(),
            'secretariat_items' => SecretariatItem::count(),
            'financial_records' => FinancialRecord::count(),
        ];

        return Inertia::render('admin/dashboard', [
            'stats' => $stats
        ]);
    }
}