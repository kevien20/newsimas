<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Master\PegawaiController;
use App\Http\Controllers\Api\Master\TtdbalaiController;
use App\Http\Controllers\Api\Master\PpkController;
use App\Http\Controllers\Api\Proses\Surattugas\SurattugasJoin;
use App\Http\Controllers\Api\Proses\Surattugas\SurattugasController;
use App\Http\Controllers\Api\Proses\Surattugas\SurattugasdetailController;
use App\Http\Controllers\Api\Proses\Suratkeluar\SuratkeluarController;
use App\Http\Controllers\Api\AuthController;


//posts
//route pegawai


Route::get("/pegawai", [PegawaiController::class, "index"])->middleware('auth:sanctum');
Route::post("/pegawai", [PegawaiController::class, "store"])->middleware('auth:sanctum');
Route::get("/pegawai/{pegawai}", [PegawaiController::class, "show"])->middleware('auth:sanctum');
Route::put("/pegawai/{pegawai}", [PegawaiController::class, "update"])->middleware('auth:sanctum');
Route::delete("/pegawai/{pegawai}", [PegawaiController::class, "destroy"])->middleware('auth:sanctum');

//route ttdbalai
Route::get("/ttdbalai", [TtdbalaiController::class, "index"])->middleware('auth:sanctum');
Route::post("/ttdbalai", [TtdbalaiController::class, "store"])->middleware('auth:sanctum');
Route::get("/ttdbalai", [TtdbalaiController::class, "show"])->middleware('auth:sanctum');
Route::put("/ttdbalai/{ttdbalai}", [TtdbalaiController::class, "update"])->middleware('auth:sanctum');
Route::delete("/ttdbalai/{ttdbalai}", [TtdbalaiController::class, "destroy"])->middleware('auth:sanctum');

//route ppk
Route::get("/ppk", [PpkController::class, "index"])->middleware('auth:sanctum');
Route::post("/ppk", [PpkController::class, "store"])->middleware('auth:sanctum');
Route::get("/ppk/{ppk}", [PpkController::class, "show"])->middleware('auth:sanctum');
Route::put("/ppk/{ppk}", [PpkController::class, "update"])->middleware('auth:sanctum');
Route::delete("/ppk/{ppk}", [PpkController::class, "destroy"])->middleware('auth:sanctum');

//route surat tugas
Route::get("/sutug", [SurattugasController::class, "index"])->middleware('auth:sanctum');
Route::post("/sutug", [SurattugasController::class, "store"])->middleware('auth:sanctum');
Route::get("/sutug/{sutug}", [SurattugasController::class, "show"])->middleware('auth:sanctum');
Route::put("/sutug/{sutug}", [SurattugasController::class, "update"])->middleware('auth:sanctum');
Route::delete("/sutug/{sutug}", [SurattugasController::class, "destroy"])->middleware('auth:sanctum');

//route surat tugas detail
Route::get("/sutugdetail", [SurattugasdetailController::class, "index"])->middleware('auth:sanctum');
Route::post("/sutugdetail", [SurattugasdetailController::class, "store"])->middleware('auth:sanctum');
Route::get("/sutugdetail/{sutugdetail}", [SurattugasdetailController::class, "show"])->middleware('auth:sanctum');
Route::put("/sutugdetail/{sutugdetail}", [SurattugasdetailController::class, "update"])->middleware('auth:sanctum');
Route::delete("/sutugdetail/{sutugdetail}", [SurattugasdetailController::class, "destroy"])->middleware('auth:sanctum');

//route surat tugas join
Route::get("/sutugjoin", [SurattugasJoin::class, "index"])->middleware('auth:sanctum');
Route::get("/sutugjoin/{sutugjoin}", [SurattugasJoin::class, "show"])->middleware('auth:sanctum');

//route surat keluar
Route::get("/sukel", [SuratkeluarController::class, "index"])->middleware('auth:sanctum');
Route::post("/sukel", [SuratkeluarController::class, "store"])->middleware('auth:sanctum');
Route::get("/sukel/{sukel}", [SuratkeluarController::class, "show"])->middleware('auth:sanctum');
Route::put("/sukel/{sukel}", [SuratkeluarController::class, "update"])->middleware('auth:sanctum');
Route::delete("/sukel/{sukel}", [SuratkeluarController::class, "destroy"])->middleware('auth:sanctum');



Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/logoutall', [AuthController::class, 'logoutall']);
//Route::get('/auth/profile', function(Request $request) {
    //return auth('sanctum')->user();
   
//});
//Route::middleware('auth:sanctum')->get('/auth/profile', function (AuthController $request) {
    //return $request->user();
//});
//Protecting Routes

    Route::get('/auth/profile', function(Request $request) {
        return  auth('sanctum')->user();
    });