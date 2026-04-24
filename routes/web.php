<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\ResultController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| USER LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // halaman voting user
    Route::get('/vote', [VotingController::class, 'index'])->name('vote');
    Route::post('/vote', [VotingController::class, 'store'])->name('vote.store');

    // selesai voting
    Route::get('/sudah-voting', function () {
        return view('sudah-voting');
    })->name('sudah-voting');

    // hasil voting bisa dilihat user login
    Route::get('/results', [ResultController::class, 'index'])->name('results');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // data kandidat
    Route::resource('candidates', CandidateController::class);

    // data pemilih
    Route::resource('voters', VoterController::class);

});


/*
|--------------------------------------------------------------------------
| AUTH BREEZE / LOGIN REGISTER
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';