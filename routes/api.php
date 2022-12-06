<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


//posts
Route::apiResource('/pegawai', App\Http\Controllers\Api\Master\PegawaiController::class);
Route::apiResource('/ttdbalai', App\Http\Controllers\Api\Master\TtdbalaiController::class);
Route::apiResource('/ppk', App\Http\Controllers\Api\Master\PpkController::class);
Route::apiResource('/sutug', App\Http\Controllers\Api\Proses\SurattugasController::class);
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');