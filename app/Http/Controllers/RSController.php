<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RSService;

class RSController extends Controller
{
    private $rsService;

    public function __construct(RSService $rsService)
    {
        $this->rsService = $rsService;
    }


    // dokter
    public function listDokter()
    {
        return response()->json([
            'data' => $this->rsService->listDokter(),
            'status' => '200'
        ]);
    }
}
