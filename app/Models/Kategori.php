<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Beri tahu Laravel nama tabel yang benar
    protected $table = 'kategori';
    
    // Izinkan semua kolom diisi data, kecuali ID
    protected $guarded = ['id'];

    // Relasi: Satu Kategori punya banyak Produk
    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}