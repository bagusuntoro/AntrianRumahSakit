<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatPasien extends Model
{
    use HasFactory;
    protected $table = 'obat_pasiens';
    protected $fillable = ['pasien_id', 'obat_id'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
