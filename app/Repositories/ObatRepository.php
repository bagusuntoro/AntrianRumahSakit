<?php

namespace App\Repositories;

use App\Models\Obat;

class ObatRepository
{
     private $obat;

     public function __construct(Obat $obat)
     {
        $this->obat = $obat;
     }

     public function listObat()
    {
        return $this->obat->get();
    }

    public function createObat(array $data)
    {
        return $this->obat->create($data);
    }

    public function detailObat($id)
    {
        return $this->obat->find($id);
    }

    public function updateObat(array $data, $id)
    {
        $dataObat = $this->obat->find($id);
        $dataObat->update($data);
        
        return $dataObat;
    }

    public function deleteObat($id)
    {
        $dataObat = $this->obat->find($id);
        $dataObat->delete();
        return 'data berhasil dihapus';
    }
}