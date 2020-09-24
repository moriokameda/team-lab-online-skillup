<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\InstagramController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/instagram',[InstagramController::class,'index'])->name('instagram');
/**
 * 認証関連
 */
Route::prefix('login')->group(function () {
    Route::get('/{provider}', [OAuthController::class, 'socialOAuth'])->where('provider', 'github|facebook|google');
    Route::get('/{provider}/callback', [OAuthController::class, 'handleProviderCallback'])
        ->where('provider', 'github|facebook|google');
});

Route::get('register/{provider}',[OAuthController::class, 'showRegistrationForm'])
    ->where('provider','github|facebook|google')->name('oauth.register');