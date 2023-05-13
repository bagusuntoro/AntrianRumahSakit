<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PasienService;

class PasienController extends Controller
{
    private $pasienService;

    public function __construct(PasienService $pasienService)
    {
        $this->pasienService = $pasienService;
    }

    public function listPasien()
    {
        try {
            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->pasienService->listPasien()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed to get data pasien',
                'status' => '500',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function detailPasien($id)
    {
        try {
            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->pasienService->detailPasien($id)
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed to get data pasien',
                'status' => '500',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function createPasien(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nomor_antrian' => 'required|numeric',
                'nama_pasien' => 'required|string',
                'keluhan' => 'required|string',
                'alamat' => 'required|string',
                'no_hp' => 'required|string',
                'no_ktp' => 'required|string',
                'status' => 'required|string',
                'dokter_id' => 'required|string'
            ]);

            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->pasienService->createPasien($request)
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed to create data pasien',
                'status ' => '500',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function statusPasien(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'status' => 'required|string'
            ]);

            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->pasienService->statusPasien($request, $id)
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed to set status pasien',
                'status' => '500',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function updatePasien(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'nomor_antrian' => 'required|numeric',
                'nama_pasien' => 'required|string',
                'keluhan' => 'required|string',
                'alamat' => 'required|string',
                'no_hp' => 'required|string',
                'no_ktp' => 'required|string',
                'status' => 'required|string',
                'dokter_id' => 'required|string'
            ]);

            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->pasienService->updatePasien($request, $id)
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed to update data pasien',
                'status ' => '500',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function deletePasien($id)
    {
        try {
            return response()->json([
                'message' => $this->pasienService->deletePasien($id),
                'status' => '200'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed to delete data pasien',
                'status ' => '500',
                'error' => $th->getMessage()
            ]);
        }
    }
}



