<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeBarang extends Model
{
    use HasFactory;
    protected $table = 'kode_barangs';

    protected $fillable = [
        'id_kategori', 'kode_barang','nama_barang','harga','foto'
    ];
}
