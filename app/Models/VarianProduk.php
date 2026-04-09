<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarianProduk extends Model
{
    protected $table = 'varian_produk';
    protected $guarded = ['id'];

    // Relasi balik: Varian ini milik Produk apa?
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}