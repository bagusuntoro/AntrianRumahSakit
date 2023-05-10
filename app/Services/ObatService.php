<?php 

namespace App\Services;

use App\Repositories\ObatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatService
{
    private $obatRepository;

    public function __construct(ObatRepository $obatRepository)
    {
        $this->obatRepository = $obatRepository;
    }

    public function listObat()
    {
        return $this->obatRepository->listObat();
    }

    public function createObat(Request $request)
    {
        $dataObat = [
            'nama_obat' => $request->nama_obat,
            'khasiat' => $request->khasiat,
            'aturan_minum' => $request->aturan_minum,
        ];
        
        return $this->obatRepository->createObat($dataObat);
    }

    public function detailObat($id)
    {
        return $this->obatRepository->detailObat($id);
    }

    public function updateObat(Request $request, $id)
    {
        $dataObat = [
            'nama_obat' => $request->nama_obat,
            'khasiat' => $request->khasiat,
            'aturan_minum' => $request->aturan_minum,
        ];
        
        return $this->obatRepository->updateObat($dataObat, $id);
    }

    public function deleteObat($id)
    {
        return $this->obatRepository->deleteObat($id);
    }
    
}
