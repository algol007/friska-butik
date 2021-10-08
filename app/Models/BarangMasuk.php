<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    // use HasFactory;
    protected $table = 'barang_masuks';

    protected $fillable = [
        'id_kode_barang', 'tanggal_masuk', 'jumlah'
    ];

}
