<?php

namespace Database\Seeders;

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
        DB::table('kode_barangs')->insert([
            'kode_barang' => Str::random(4),
            'nama_barang' => Str::random(10),
            'harga' => 100000,
            'foto' => '',
        ]);    
    }
}
