<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $createdCampaigns = Campaign::query()
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $recentDonations = Donation::query()
            ->with('campaign')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'user',
            'createdCampaigns',
            'recentDonations'
        ));
    }

    public function admin()
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $stats = [
            'total_campaigns' => Campaign::count(),

            'active_campaigns' => Campaign::where(
                'status',
                'active'
            )->count(),

            'total_donations' => Donation::sum(
                'amount'
            ),

            'total_donors' => Donation::distinct(
                'user_id'
            )->count(),
        ];

        $recentCampaigns = Campaign::query()
            ->latest()
            ->take(5)
            ->get();

        return view(
            'dashboard.admin',
            compact('stats', 'recentCampaigns')
        );
    }
}
