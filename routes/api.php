<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('dokter', [DokterController::class,'listDokter']);
Route::post('dokter', [DokterController::class,'createDokter']);
Route::post('dokter/{id}', [DokterController::class,'updateDokter']);
Route::post('selectdokter/{id}', [DokterController::class,'selectDokter']);
Route::post('statusdokter/{id}', [DokterController::class,'setStatusDokter']);
Route::delete('dokter/{id}', [DokterController::class,'deleteDataDokter']);


Route::get('obat', [ObatController::class,'listObat']);
Route::post('obat', [ObatController::class,'createObat']);
Route::post('obat/{id}', [ObatController::class,'updateObat']);
Route::get('detailObat/{id}', [ObatController::class,'detailObat']);
Route::delete('obat/{id}', [ObatController::class,'deleteObat']);