<?php

namespace App\Repositories;

use App\Models\Pasien;

class PasienRepository
{
    private $pasien;

    public function __construct(Pasien $pasien)
    {
        $this->pasien = $pasien;
    }

    public function listPasien()
    {
        return $this->pasien->get();
    }

    public function detailPasien($id)
    {
        return $this->pasien->find($id);
    }

    public function createPasien(array $data)
    {
        return $this->pasien->create($data);
    }

    public function statusPasien($data, $id)
    {
        $dataPasien = $this->pasien->find($id);
        $dataPasien->update($data);
        return $dataPasien;
    }

    public function updatePasien(array $data, $id)
    {
        $dataPasien = $this->pasien->find($id);
        $dataPasien->update($data);
        return $dataPasien;
    }

    public function deletePasien($id)
    {
        $dataPasien = $this->pasien->find($id);
        $dataPasien->delete();
        return 'data berhasil dihapus';
    }
}