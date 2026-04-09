<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\VarianProduk; // 1. UBAH DI SINI: Panggil model yang benar

class VarianController extends Controller
{
    public function index($id)
    {
        // Tetap pakai 'varian' karena ini nama fungsi relasi di Model Produk
        $produk = Produk::with('varian')->findOrFail($id);
        
        return view('admin.produk.varian', compact('produk'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'ukuran' => 'required|string|max:255',
            'tinggi' => 'nullable|integer', // Sesuaikan dengan nama kolom di DB
            'keterangan_bantal' => 'nullable|string',
            'harga_reguler' => 'required|numeric|min:0',
            'harga_reseller' => 'required|numeric|min:0', // Wajib diisi karena di DB tidak boleh Null
        ]);

        VarianProduk::create([
            'produk_id' => $id,
            'ukuran' => $request->ukuran,
            'tinggi' => $request->tinggi, // Sesuaikan dengan nama kolom di DB
            'keterangan_bantal' => $request->keterangan_bantal,
            'harga_reguler' => $request->harga_reguler,
            'harga_reseller' => $request->harga_reseller, // Simpan ke DB
        ]);

        return back()->with('success', 'Ukuran baru berhasil ditambahkan!');
    }

    // Menambahkan fungsi update untuk menyimpan editan
    public function update(Request $request, $id)
    {
        $request->validate([
            'ukuran' => 'required|string|max:255',
            'tinggi' => 'nullable|integer',
            'keterangan_bantal' => 'nullable|string',
            'harga_reguler' => 'required|numeric|min:0',
            'harga_reseller' => 'required|numeric|min:0',
        ]);

        $varian = \App\Models\VarianProduk::findOrFail($id);
        $varian->update([
            'ukuran' => $request->ukuran,
            'tinggi' => $request->tinggi,
            'keterangan_bantal' => $request->keterangan_bantal,
            'harga_reguler' => $request->harga_reguler,
            'harga_reseller' => $request->harga_reseller,
        ]);

        return back()->with('success', 'Data ukuran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // 3. UBAH DI SINI: Gunakan VarianProduk untuk Delete
        $varian = VarianProduk::findOrFail($id);
        $varian->delete();

        return back()->with('success', 'Ukuran berhasil dihapus!');
    }
}