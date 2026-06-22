<?php

use App\Http\Controllers\ProjectIdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tim = [
        [
            'nama'  => 'Ferdiyansyah Pratama Putra',
            'nim'   => '241110117',
            'role'  => 'ketua'
        ],
        [
            'nama'  => 'Muhammad Fathurrahman',
            'nim'   => '241110109',
            'role'  => 'anggota'
        ],
        [
            'nama'  => 'Dwi Angga Hermawan',
            'nim'   => '241110019',
            'role'  => 'anggota'
        ],
        [
            'nama'  => 'Maria Violeta V. Wungubelen',
            'nim'   => '241110105',
            'role'  => 'anggota'
        ],
        [
            'nama'  => 'Rey',
            'nim'   => '123',
            'role'  => 'anggota'
        ]
    ];
    return view('test', ['tim' => $tim]);
});

Route::resource('ideas', ProjectIdeaController::class);
