<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        // Ambil data produk beserta nama kategorinya (relasi)
        $produk = Produk::with('kategori')->latest()->get();
        
        // Ambil data kategori untuk pilihan di form Tambah Produk
        $kategori = Kategori::all(); 
        
        return view('admin.produk.index', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_produk' => 'required|string|max:255',
            'tipe_barang' => 'nullable|string|max:255',
        ]);

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'tipe_barang' => $request->tipe_barang,
        ]);

        return back()->with('success', 'Produk baru berhasil ditambahkan!');
    }

    // Menambahkan fungsi update untuk produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_produk' => 'required|string|max:255',
            'tipe_barang' => 'nullable|string|max:255',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'tipe_barang' => $request->tipe_barang,
        ]);

        return back()->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return back()->with('success', 'Produk berhasil dihapus!');
    }
}