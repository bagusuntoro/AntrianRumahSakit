<?php

namespace App\Services;

use App\Repositories\PasienRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienService
{
    private $pasienRepository;

    public function __construct(PasienRepository $pasienRepository)
    {
        $this->pasienRepository = $pasienRepository;
    }

    public function listPasien()
    {
        return $this->pasienRepository->listPasien();
    }

    public function detailPasient($id)
    {
        return $this->pasienRepository->detailPasient($id);
    }

    public function createPasien(Request $request)
    {
        $dataPasien = [
            'nomor_antrian' => $request->nomor_antrian,
            'nama_pasien' => $request->nama_pasien,
            'keluhan' => $request->keluhan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'status' => $request->status,
            'dokter_id' => $request->dokter_id
        ];

        return $this->pasienRepository->createPasien($dataPasien);
    }

    public function statusPasien(Request $request, $id)
    {
        return $this->pasienRepository->statusPasien($request, $id);
    }

    public function updatePasien(Request $request, $id)
    {
        $dataPasien = [
            'nomor_antrian' => $request->nomor_antrian,
            'nama_pasien' => $request->nama_pasien,
            'keluhan' => $request->keluhan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'status' => $request->status,
            'dokter_id' => $request->dokter_id
        ];

        return $this->pasienRepository->createPasien($dataPasien, $id);
    }

    public function deletePasien($id)
    {
        return $this->pasienRepository->deletePasien($id);
    }
}
