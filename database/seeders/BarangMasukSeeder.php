<?php

namespace Database\Seeders;
use App\Models\BarangMasuk;
use Illuminate\Database\Seeder;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang_masuk = new BarangMasuk;
        $barang_masuk->id_kode_barang = 3;
        $barang_masuk->tanggal_masuk = date("Y-m-d");
        $barang_masuk->jumlah = 50;
        $barang_masuk->save();
    }
}
