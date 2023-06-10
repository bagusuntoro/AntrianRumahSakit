<?php

namespace App\Services;

use App\Repositories\DokterRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokterService
{
    private $dokterRepository;

    public function __construct(DokterRepository $dokterRepository)
    {
        $this->dokterRepository = $dokterRepository;
    }

    public function listDokter()
    {
        return $this->dokterRepository->listDokter();
    }

    public function getDokterStandBy()
    {
        return $this->dokterRepository->getDokterStandBy();
    }
    public function getDokterCuti()
    {
        return $this->dokterRepository->getDokterCuti();
    }
    public function getDokterIstirahat()
    {
        return $this->dokterRepository->getDokterIstirahat();
    }
    
    public function createDokter(Request $request)
    {
        $dataDokter = [
            'nama_dokter' => $request->nama_dokter,
            'keahlian' => $request->keahlian
        ];
        
        return $this->dokterRepository->createDokter($dataDokter);
    }

    public function selectDokter(Request $request, $id)
    {
        $addPasien= $request->jumlah_pasien;
        return $this->dokterRepository->selectDokter($addPasien, $id);
    }

    public function setStatusDokter(Request $request, $id)
    {
        $status = $request->status;
        
        return $this->dokterRepository->setStatusDokter($status, $id);
    }

    public function updateDokter(Request $request, $id)
    {
        $dataDokter = [
            'nama_dokter' => $request->nama_dokter,
            'keahlian' => $request->keahlian
        ];

        return $this->dokterRepository->updateDokter($dataDokter, $id);
    }

    public function deleteDataDokter($id)
    {
        return $this->dokterRepository->deleteDataDokter($id);
    }
}