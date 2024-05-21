<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\ApiAuthController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\HomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(['auth:sanctum','isEmailVerifiedApi']);
Route::post('login', [ApiAuthController::class,'loginUser'])->name('user.login');
Route::post('register', [ApiAuthController::class,'store'])->name('user.register');
Route::get('auth/{provider}/redirect', [SocialiteController::class, 'loginSocial'])
->name('socialite.auth');

Route::get('auth/{provider}/callback', [SocialiteController::class, 'callbackSocial'])
->name('socialite.callback');
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('verify/email', [ApiAuthController::class,'verify'])->name('user.verify.email');
    Route::post('logout', [ApiAuthController::class,'logout'])->name('user.logout');
    Route::get('dashboard', [HomeController::class,'indexUsersApi'])->name('dashboard');
   
});