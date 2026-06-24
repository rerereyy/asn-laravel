<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function getTeam()
    {
        return [
            [
                'id' => 1,
                'nama' => 'Ferdiyansyah Pratama Putra',
                'nim' => '241110117',
                'role' => 'ketua',
            ],
            [
                'id' => 2,
                'nama' => 'Muhammad Fathurrahman',
                'nim' => '241110109',
                'role' => 'anggota',
            ],
            [
                'id' => 4,
                'nama' => 'Maria Violeta V. Wungubelen',
                'nim' => '241110105',
                'role' => 'anggota',
            ],
        ];
    }

    public function index()
    
    {

        return view('about.index', ['teams' => self::getTeam()]);
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
