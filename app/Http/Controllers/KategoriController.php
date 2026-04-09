<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori; // Panggil model Kategori

class KategoriController extends Controller
{
    // Menampilkan halaman kategori beserta datanya
    public function index()
    {
        // Ambil semua data kategori dari database, urutkan dari yang terbaru
        $kategori = Kategori::latest()->get(); 
        
        return view('admin.kategori.index', compact('kategori'));
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'bisa_custom' => 'required|boolean',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'bisa_custom' => $request->bisa_custom,
        ]);

        // Lempar kembali ke halaman yang sama dengan pesan sukses
        return back()->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}