<?php

use Illuminate\Support\Facades\Route;

//posts
//Route::get("pegawai",  [PegawaiController::class, "index"]);
//Route::post("pegawai",  [PegawaiController::class, "store"]);
//Route::put("pegawai/{id}", [PegawaiController::class, "store"]);

Route::apiResource('/tes', App\Http\Controllers\Api\PegawaiController::class);