<?php

namespace App\Repositories;

use App\Models\Pasien;
use App\Models\Dokter;

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

    public function getPasienAntri()
    {
        return $this->pasien->join('dokters', 'pasiens.dokter_id', '=', 'dokters.id')
            ->where('pasiens.status', 'antri')
            ->select('pasiens.*', 'dokters.nama_dokter')
            ->get();
    }
    
    
    


    public function getPasienMasuk()
    {
        return $this->pasien->join('dokters', 'pasiens.dokter_id', '=', 'dokters.id')
            ->where('pasiens.status', 'masuk')
            ->select('pasiens.*', 'dokters.nama_dokter')
            ->get();
    }
    public function getPasienApotek()
    {
        return $this->pasien->join('dokters', 'pasiens.dokter_id', '=', 'dokters.id')
            ->where('pasiens.status', 'apotek')
            ->select('pasiens.*', 'dokters.nama_dokter')
            ->get();
    }
    public function getPasienSelesai()
    {
        return $this->pasien->join('dokters', 'pasiens.dokter_id', '=', 'dokters.id')
            ->where('pasiens.status', 'selesai')
            ->select('pasiens.*', 'dokters.nama_dokter')
            ->get();
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
        $dataPasien->status = $data;
        $dataPasien->save();
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