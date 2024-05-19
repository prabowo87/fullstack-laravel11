<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\ApiAuthController;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */
Route::post('login', [ApiAuthController::class,'loginUser'])->name('user.login');
Route::post('register', [ApiAuthController::class,'store'])->name('user.register');
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('logout', [ApiAuthController::class,'logout'])->name('user.logout');
   
});