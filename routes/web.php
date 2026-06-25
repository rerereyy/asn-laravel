<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');

Route::get('/campaigns/{campaign}', [CampaignController::class, 'show'])
  ->whereNumber('campaign')
  ->name('campaigns.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');

Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::middleware('auth')->group(function () {
  Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');

  Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

  Route::get('/campaigns/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
  Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])->name('campaigns.update');
  Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');

  Route::post('/campaigns/{campaign}/donate', [CampaignController::class, 'donate'])->name('campaigns.donate');
  Route::post('/campaigns/{campaign}/comment', [CampaignController::class, 'comment'])->name('campaigns.comment');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
