<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AuthController;




// public
Route::post('pasien', [PasienController::class,'createPasien']);
Route::get('pasien-antri', [PasienController::class,'getPasienAntri']);
Route::get('pasien-masuk', [PasienController::class,'getPasienMasuk']);
Route::get('dokter', [DokterController::class,'listDokter']);
Route::post('selectdokter/{id}', [DokterController::class,'selectDokter']);





// admin
Route::group([
    'prefix' => 'auth'
  ], function () {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::group([
      'middleware' => 'auth:api'
    ], function(){
      Route::post('logout', [AuthController::class,'logout']);
      Route::post('refresh', [AuthController::class, 'refresh']);
      Route::get('me', [AuthController::class,'me']);
  
      // voting process
      Route::group([
        'middleware' => 'auth:api'
      ], function () {
        Route::get('dokter-standby', [DokterController::class,'getDokterStandBy']);
        Route::get('dokter-cuti', [DokterController::class,'getDokterCuti']);
        Route::get('dokter-istirahat', [DokterController::class,'getDokterIstirahat']);
        
        Route::post('dokter', [DokterController::class,'createDokter']);
        Route::post('dokter/{id}', [DokterController::class,'updateDokter']);
        Route::post('statusdokter/{id}', [DokterController::class,'setStatusDokter']);
        Route::delete('dokter/{id}', [DokterController::class,'deleteDataDokter']);
        
        Route::get('obat', [ObatController::class,'listObat']);
        Route::post('obat', [ObatController::class,'createObat']);
        Route::post('obat/{id}', [ObatController::class,'updateObat']);
        Route::get('detailobat/{id}', [ObatController::class,'detailObat']);
        Route::delete('obat/{id}', [ObatController::class,'deleteObat']);
        
        Route::get('pasien', [PasienController::class,'listPasien']);
        Route::get('pasien-apotek', [PasienController::class,'getPasienApotek']);
        Route::get('pasien-selesai', [PasienController::class,'getPasienSelesai']);
        Route::post('pasien/{id}', [PasienController::class,'updatePasien']);
        Route::post('statuspasien/{id}', [PasienController::class,'statusPasien']);
        Route::get('detailpasien/{id}', [PasienController::class,'detailPasien']);
        Route::delete('pasien/{id}', [PasienController::class,'deletePasien']);
        
      });
      
    });
  });