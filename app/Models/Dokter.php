<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokters';

    protected $fillable = [
        'nama_dokter',
        'keahlian',
        'jumlah_pasien',
    ];
    
    public function pasiens()
    {
        return $this->hasMany(Pasien::class);
    }
}
