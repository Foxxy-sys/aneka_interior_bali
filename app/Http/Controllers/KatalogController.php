<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class KatalogController extends Controller
{
    public function index()
    {
        // Ambil semua data kategori untuk tombol filter
        $kategori = Kategori::all();
        
        // Ambil semua produk beserta relasi kategori dan variannya
        $produk = Produk::with(['kategori', 'varian'])->latest()->get();

        return view('katalog.index', compact('kategori', 'produk'));
    }

    // Menampilkan detail produk
    public function show($id)
    {
        // Ambil data produk beserta relasi kategori dan variannya
        $produk = Produk::with(['kategori', 'varian'])->findOrFail($id);
        
        return view('katalog.show', compact('produk'));
    }
}