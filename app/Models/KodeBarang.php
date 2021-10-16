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

    public function kategori()
    {
        return $this->belongsTo('App\Models\Category', 'id_kategori');
    }

    public function barangmasuk()
    {
        return $this->hasMany('App\Models\BarangMasuk', 'id_kode_barang');
    }

    public function barangkeluar()
    {
        return $this->hasMany('App\Models\BarangKeluar', 'id_kode_barang');
    }

}
