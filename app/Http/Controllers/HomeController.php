<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CongregationalGroup;
use App\Models\ChurchOrganization;
use App\Models\SpecialEvent;
use App\Models\DiakoniaMember;
use App\Models\Devotional;
use App\Models\ChurchOfficial;
use App\Models\SecretariatItem;
use App\Models\FinancialRecord;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the church community home page.
     */
    public function index(Request $request)
    {
        // Get data that's visible to all authenticated users and members
        $congregationalGroups = CongregationalGroup::active()->get();
        $churchOrganizations = ChurchOrganization::active()->get();
        $specialEvents = SpecialEvent::active()->orderBy('scheduled_at')->get();
        
        // Data visible only to authenticated members
        $diakoniaMembers = null;
        $currentDevotional = null;
        $churchOfficials = null;
        $secretariatItems = null;
        
        if (auth()->check()) {
            $diakoniaMembers = DiakoniaMember::active()->orderBy('name')->get();
            $currentDevotional = Devotional::published()
                ->where('week_starting', '<=', now())
                ->orderBy('week_starting', 'desc')
                ->first();
            $churchOfficials = ChurchOfficial::active()
                ->orderBy('order_priority')
                ->orderBy('position')
                ->get();
            $secretariatItems = SecretariatItem::published()
                ->where('published_date', '<=', now())
                ->orderBy('published_date', 'desc')
                ->limit(10)
                ->get();
        }
        
        // Financial data is visible to everyone (including guests)
        $financialRecords = FinancialRecord::published()
            ->orderBy('received_date', 'desc')
            ->limit(20)
            ->get();
        
        return Inertia::render('home', [
            'congregationalGroups' => $congregationalGroups,
            'churchOrganizations' => $churchOrganizations,
            'specialEvents' => $specialEvents,
            'diakoniaMembers' => $diakoniaMembers,
            'currentDevotional' => $currentDevotional,
            'churchOfficials' => $churchOfficials,
            'secretariatItems' => $secretariatItems,
            'financialRecords' => $financialRecords,
            'isAuthenticated' => auth()->check(),
            'isAdmin' => auth()->check() ? auth()->user()->isAdmin() : false,
        ]);
    }
}