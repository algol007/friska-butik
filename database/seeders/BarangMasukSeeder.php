<?php

namespace Database\Seeders;

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
        DB::table('barang_masuks')->insert([
            'id_kode_barang' => 1,
            'tanggal_masuk' => date("Y-m-d H:i:s"),
            'jumlah' => Int::random(4),
        ]);    
    }
}
