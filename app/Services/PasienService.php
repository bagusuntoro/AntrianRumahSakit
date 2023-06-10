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

    public function detailPasien($id)
    {
        return $this->pasienRepository->detailPasien($id);
    }

    public function getPasienAntri()
    {
        return $this->pasienRepository->getPasienAntri();
    }
    public function getPasienMasuk()
    {
        return $this->pasienRepository->getPasienMasuk();
    }
    public function getPasienApotek()
    {
        return $this->pasienRepository->getPasienApotek();
    }
    public function getPasienSelesai()
    {
        return $this->pasienRepository->getPasienSelesai();
    }

    public function createPasien(Request $request)
    {
        $dataPasien = [
            // 'nomor_antrian' => $request->nomor_antrian,
            'nama_pasien' => $request->nama_pasien,
            'keluhan' => $request->keluhan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            // 'status' => $request->status,
            'dokter_id' => $request->dokter_id
        ];

        return $this->pasienRepository->createPasien($dataPasien);
    }

    public function statusPasien(Request $request, $id)
    {
        $status = $request->status;
        return $this->pasienRepository->statusPasien($status, $id);
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

        return $this->pasienRepository->updatePasien($dataPasien, $id);
    }

    public function deletePasien($id)
    {
        return $this->pasienRepository->deletePasien($id);
    }
}
