<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obats';

    protected $fillable = [
        'nama_obat',
        'khasiat',
        'aturan_minum',
    ];

    public function pasiens()
    {
        return $this->belongsToMany(Pasien::class)->withTimestamps();
    }
}