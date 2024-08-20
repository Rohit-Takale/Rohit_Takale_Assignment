<?php

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('process_data', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
// Route::view('home', 'home')
// ->middleware(['auth', 'verified'])
// ->name('home');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::middleware(['auth', 'verified'])->controller(LoanController::class)->group(function (){
        Route::get('home', 'index')->name('home');
        Route::get('emi_data', 'emiData')->name('emi_data');
        Route::get('display_emi_details','showEmiDetails')->name('display_emi_details');
    });

    

require __DIR__.'/auth.php';
