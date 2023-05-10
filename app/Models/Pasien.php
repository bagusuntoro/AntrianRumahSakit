<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    
    protected $fillable = [
        'nomor_antrian',
        'nama_pasien',
        'keluhan',
        'alamat',
        'hp',
        'ktp',
        'status',
        'dokter_id',
    ];
    
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function obats()
    {
        return $this->belongsToMany(Obat::class)->withTimestamps();
    }
}
