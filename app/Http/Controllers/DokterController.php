<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DokterService;

class DokterController extends Controller
{
    private $dokterService;

    public function __construct(DokterService $dokterService)
    {
        $this->dokterService = $dokterService;
    }


    public function listDokter()
    {
        try {
            $data = $this->dokterService->listDokter();
            return response()->json([
                'data' => $data,
                'status' => '200'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get list data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getDokterStandBy()
    {
        try {
            $data = $this->dokterService->getDokterStandBy();
            return response()->json([
                'data' => $data,
                'status' => '200'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get list data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function getDokterCuti()
    {
        try {
            $data = $this->dokterService->getDokterCuti();
            return response()->json([
                'data' => $data,
                'status' => '200'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get list data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function getDokterIstirahat()
    {
        try {
            $data = $this->dokterService->getDokterIstirahat();
            return response()->json([
                'data' => $data,
                'status' => '200'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get list data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }
    
    public function createDokter(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nama_dokter' => 'required|string',
                'keahlian' => 'required|string'
            ]);
            $data = $this->dokterService->createDokter($request);
            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }
    

    public function selectDokter(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'jumlah_pasien' => 'required|numeric'
            ]);

            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->dokterService->selectDokter($request, $id)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Failed to select data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }

    }

    public function setStatusDokter(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'status' => 'required|string'
            ]);
    
            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->dokterService->setStatusDokter($request, $id)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Failed to set data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updateDokter(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'nama_dokter' => 'string',
                'keahlian' => 'string'
            ]);
    
            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->dokterService->updateDokter($request, $id)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Failed to update data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function deleteDataDokter($id)
    {
        try {
            return response()->json([
                'message'=> $this->dokterService->deleteDataDokter($id)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Failed to delete data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }
}
