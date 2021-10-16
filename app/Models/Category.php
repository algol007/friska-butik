<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'nama_kategori'
    ];

    public function kodebarang()
    {
        return $this->hasMany('App\KodeBarang', 'id_kategori');
    }

}
