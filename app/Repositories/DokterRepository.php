<?php

namespace App\Repositories;

use App\Models\Dokter;

class DokterRepository
{
    private $dokter;

    public function __construct(Dokter $dokter)
    {
        $this->dokter = $dokter;
    }

    public function listDokter()
    {
        return $this->dokter->get();
    }
    
    public function createDokter(array $data)
    {
        return $this->dokter->create($data);
    }

    public function selectDokter($addPasien, $id)
    {
        $dataDokter = $this->dokter->find($id);
        $dataDokter->jumlah_pasien += $addPasien;
        $dataDokter->save();

        return $dataDokter;
    }

    public function setStatusDokter($status, $id)
    {
        $dataDokter = $this->dokter->find($id);
        $dataDokter->status = $status;
        $dataDokter->save();

        return $dataDokter;
    }

    public function updateDokter(array $data, $id)
    {
        $dataDokter = $this->dokter->find($id);
        $dataDokter->update($data);

        return $dataDokter;
    }

    public function deleteDataDokter($id)
    {
        $dataDokter = $this->dokter->find($id);
        $dataDokter->delete();
        return 'data berhasil dihapus';
    }
}