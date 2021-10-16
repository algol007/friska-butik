<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = new Category;
        $kategori->nama_kategori = "Outer";
        $kategori->save();
    }
}
