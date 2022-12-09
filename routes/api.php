<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Master\PegawaiController;
use App\Http\Controllers\Api\AuthController;


//posts
//route pegawai


Route::get("/pegawai", [PegawaiController::class, "index"])->middleware('auth:sanctum');
Route::post("/pegawai", [PegawaiController::class, "store"])->middleware('auth:sanctum');
Route::get("/pegawai/{pegawai}", [PegawaiController::class, "show"])->middleware('auth:sanctum');
Route::put("/pegawai/{pegawai}", [PegawaiController::class, "update"])->middleware('auth:sanctum');
Route::delete("/pegawai/{pegawai}", [PegawaiController::class, "destroy"])->middleware('auth:sanctum');

//route ttdbalai
Route::get("/ttdbalai", [App\Http\Controllers\Api\Master\TtdbalaiController::class, "index"]);
Route::post("/ttdbalai", [App\Http\Controllers\Api\Master\TtdbalaiController::class, "store"]);
Route::get("/ttdbalai/{ttdbalai}", [App\Http\Controllers\Api\Master\TtdbalaiController::class, "show"]);
Route::put("/ttdbalai/{ttdbalai}", [App\Http\Controllers\Api\Master\TtdbalaiController::class, "update"]);
Route::delete("/ttdbalai/{ttdbalai}", [App\Http\Controllers\Api\Master\TtdbalaiController::class, "destroy"]);

//route ppk
Route::get("/ppk", [App\Http\Controllers\Api\Master\PpkController::class, "index"]);
Route::post("/ppk", [App\Http\Controllers\Api\Master\PpkController::class, "store"]);
Route::get("/ppk/{ppk}", [App\Http\Controllers\Api\Master\PpkController::class, "show"]);
Route::put("/ppk/{ppk}", [App\Http\Controllers\Api\Master\PpkController::class, "update"]);
Route::delete("/ppk/{ppk}", [App\Http\Controllers\Api\Master\PpkController::class, "destroy"]);


//route surat tugas
Route::get("/sutug", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasController::class, "index"]);
Route::post("/sutug", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasController::class, "store"]);
Route::get("/sutug/{sutug}", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasController::class, "show"]);
Route::put("/sutug/{sutug}", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasController::class, "update"]);
Route::delete("/sutug/{sutug}", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasController::class, "destroy"]);

//route surat tugas detail
Route::get("/sutugdetail", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasdetailController::class, "index"]);
Route::post("/sutugdetail", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasdetailController::class, "store"]);
Route::get("/sutugdetail/{sutugdetail}", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasdetailController::class, "show"]);
Route::put("/sutugdetail/{sutugdetail}", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasdetailController::class, "update"]);
Route::delete("/sutugdetail/{sutugdetail}", [App\Http\Controllers\Api\Proses\Surattugas\SurattugasdetailController::class, "destroy"]);

//route surat keluar
Route::get("/sukel", [App\Http\Controllers\Api\Proses\Suratkeluar\SuratkeluarController::class, "index"]);
Route::post("/sukel", [App\Http\Controllers\Api\Proses\Suratkeluar\SuratkeluarController::class, "store"]);
Route::get("/sukel/{sukel}", [App\Http\Controllers\Api\Proses\Suratkeluar\SuratkeluarController::class, "show"]);
Route::put("/sukel/{sukel}", [App\Http\Controllers\Api\Proses\Suratkeluar\SuratkeluarController::class, "update"]);
Route::delete("/sukel/{sukel}", [App\Http\Controllers\Api\Proses\Suratkeluar\SuratkeluarController::class, "destroy"]);



Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
