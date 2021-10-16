<?php

namespace Database\Seeders;
use App\Models\KodeBarang;

use Illuminate\Database\Seeder;

class KodeBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kode_barang = new KodeBarang;
        $kode_barang->id_kategori = 3;
        $kode_barang->kode_barang = "GMS-01";
        $kode_barang->nama_barang = "Gamis Syar'i Hitam";
        $kode_barang->harga = 150000;
        $kode_barang->save();
    }
}
