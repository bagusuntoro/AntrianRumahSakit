<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ObatService;

class ObatController extends Controller
{
    private $obatService;

    public function __construct(ObatService $obatService)
    {
        $this->obatService = $obatService;
    }

    public function listObat()
    {
        try {
            return response()->json([
                'message'=>'success',
                'status' => '200',
                'data' => $this->obatService->listObat()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'failed to get data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function createObat(Request $request)
    {
        try {
            $validateData = [
                'nama_obat' => 'required|string',
                'khasiat' => 'required|string',
                'aturan_minum' => 'required|string'
            ];

            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->obatService->createObat($request)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'failed to create data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function detailObat($id)
    {
        try {
            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->obatService->detailObat($id)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'failed to detail data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updateObat(Request $request, $id)
    {
        try {
            $validateData = [
                'nama_obat' => 'required|string',
                'khasiat' => 'required|string',
                'aturan_minum' => 'required|string'
            ];

            return response()->json([
                'message' => 'success',
                'status' => '200',
                'data' => $this->obatService->updateObat($request, $id)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'failed to update data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function deleteObat($id)
    {
        try {
            return response()->json([
                'message' => $this->obatService->deleteObat($id)
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'failde to delete data',
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }
}
