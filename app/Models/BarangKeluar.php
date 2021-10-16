<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    // use HasFactory;
    protected $table = 'barang_keluars';

    protected $fillable = [
        'id_kode_barang', 'tanggal_keluar', 'jumlah'
    ];

    public function kodebarang()
    {
        return $this->belongsTo('App\Models\KodeBarang', 'id_kode_barang');
    }
}
