<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = ['id'];

    // Relasi balik: Produk ini milik Kategori apa?
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi: Satu Produk (misal Sprei) punya banyak Varian (L160, L180)
    public function varian()
    {
        return $this->hasMany(VarianProduk::class, 'produk_id');
    }
}