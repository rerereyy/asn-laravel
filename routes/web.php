<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/create', [CampaignController::class, 'create'])->middleware('auth')->name('campaigns.create');
Route::post('/campaigns', [CampaignController::class, 'store'])->middleware('auth')->name('campaigns.store');
Route::get('/campaigns/{id}', [CampaignController::class, 'show'])->name('campaigns.show');
Route::get('/campaigns/{id}/edit', [CampaignController::class, 'edit'])->middleware('auth')->name('campaigns.edit');
Route::put('/campaigns/{id}', [CampaignController::class, 'update'])->middleware('auth')->name('campaigns.update');
Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy'])->middleware('auth')->name('campaigns.destroy');
Route::post('/campaigns/{id}/donate', [CampaignController::class, 'donate'])->name('campaigns.donate');
Route::post('/campaigns/{id}/comment', [CampaignController::class, 'comment'])->middleware('auth')->name('campaigns.comment');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->middleware('auth')->name('dashboard.admin');

Route::get('/about', [AboutController::class, 'index'])->name('about');

