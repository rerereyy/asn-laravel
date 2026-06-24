<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tim = AboutController::getTeam();
        $stats = [
            'total_donations' => 78000000,
            'total_donors' => 1570,
            'active_campaigns' => 4,
        ];

        $categories = config('brand.categories');

        $featuredCampaigns = [
            [
                'title' => 'Bantu Anak Sekolah',
                'excerpt' => 'Dukung pembelian buku, seragam, dan perangkat belajar untuk anak-anak kurang mampu.',
                'target' => 20000000,
                'current' => 12450000,
                'donors' => 124,
                'category' => 'Pendidikan',
                'image' => 'https://images.unsplash.com/photo-1554774853-bf4c20587658?auto=format&fit=crop&w=1200&q=80',
                'route' => route('campaigns.show', 1),
            ],
            [
                'title' => 'Rumah Aman Korban Banjir',
                'excerpt' => 'Bangun hunian sementara dan paket darurat untuk keluarga terdampak banjir.',
                'target' => 50000000,
                'current' => 34200000,
                'donors' => 298,
                'category' => 'Bencana',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
                'route' => route('campaigns.show', 2),
            ],
        ];

        $testimonials = [
            ['name' => 'Andi', 'text' => 'Platform ini membantu saya donasi lebih cepat dan aman.'],
            ['name' => 'Sari', 'text' => 'Desainnya ramah dan mudah dipakai untuk semua usia.'],
        ];

        return view('home.index', compact('tim', 'stats', 'categories', 'featuredCampaigns', 'testimonials'));
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
