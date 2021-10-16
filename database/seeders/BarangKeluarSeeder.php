<?php

namespace Database\Seeders;
use App\Models\BarangKeluar;
use Illuminate\Database\Seeder;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang_keluar = new BarangKeluar;
        $barang_keluar->id_kode_barang = 3;
        $barang_keluar->tanggal_keluar = date("Y-m-d");
        $barang_keluar->jumlah = 12;
        $barang_keluar->save();
    }
}
