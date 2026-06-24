<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stats = [
            'total_donations' => Donation::sum('amount'),
            'total_donors' => Donation::distinct()->count(),
            'active_campaigns' => Campaign::query()
                ->where('status', 'active')
                ->count(),
        ];
        $featuredCampaigns = Campaign::query()
            ->where('status', 'active')
            ->latest()
            ->take(4)
            ->get();
        $categories = config('brand.categories');

        $testimonials = [
            ['name' => 'Andi', 'text' => 'Platform ini membantu saya donasi lebih cepat dan aman.'],
            ['name' => 'Sari', 'text' => 'Desainnya ramah dan mudah dipakai untuk semua usia.'],
        ];

        return view('home.index', compact('stats', 'categories', 'featuredCampaigns', 'testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
