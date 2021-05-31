<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialLoginController;

use App\Models\Game;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('matches');
});

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});

Route::get('/data-deletion', function () {
    return view('data_deletion');
});

Route::get('/privacy-policy', function () {
    return view('privacy_policy');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/rules', function () {
    return view('rules');
})->name('rules');

Route::middleware(['auth:sanctum', 'verified'])->get('/matches', function () {
    return view('matches');
})->name('matches');

Route::middleware(['auth:sanctum', 'verified'])->get('/predictions', function () {
    return view('predictions');
})->name('predictions');

Route::middleware(['auth:sanctum', 'verified'])->get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/match/{game}', function (Game $game) {
    return view('match')->with('match', $game);
})->name('match');

Route::get('/auth/redirect', [SocialLoginController::class, 'redirect'])->name('facebook.login');

Route::get('/auth/callback', [SocialLoginController::class, 'signinFacebook']);
