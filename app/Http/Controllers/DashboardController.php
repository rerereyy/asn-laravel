<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recentDonations = [
            ['campaign' => 'Bantu Anak Sekolah', 'amount' => 125000, 'date' => '12 Juni 2026'],
            ['campaign' => 'Ambulans Gratis untuk Puskesmas', 'amount' => 225000, 'date' => '04 Juni 2026'],
            ['campaign' => 'Paket Sembako Peduli Lansia', 'amount' => 75000, 'date' => '28 Mei 2026'],
        ];

        $createdCampaigns = [
            ['title' => 'Bantu Anak Sekolah', 'status' => 'Active'],
            ['title' => 'Rumah Aman Korban Banjir', 'status' => 'Active'],
        ];

        return view('dashboard.index', compact('user', 'recentDonations', 'createdCampaigns'));
    }

    public function admin()
    {
        $stats = [
            'total_campaigns' => 12,
            'active_campaigns' => 8,
            'total_donors' => 1463,
            'total_donations' => 172300000,
        ];

        $recentCampaigns = [
            ['title' => 'Rumah Aman Korban Banjir', 'target' => 50000000, 'current' => 34200000],
            ['title' => 'Ambulans Gratis untuk Puskesmas', 'target' => 32000000, 'current' => 19800000],
            ['title' => 'Paket Sembako Peduli Lansia', 'target' => 13000000, 'current' => 10100000],
        ];

        return view('dashboard.admin', compact('stats', 'recentCampaigns'));
    }
}
