<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\VarianProduk;

class KeranjangController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        // Ambil data keranjang dari session (jika kosong, array kosong)
        $keranjang = session()->get('keranjang', []);
        return view('katalog.keranjang', compact('keranjang'));
    }

    // Menambah barang ke keranjang
    public function tambah(Request $request, $id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        $keranjang = session()->get('keranjang', []);
        
        $qty = $request->qty ?? 1;
        $jenis = $request->jenis_pesanan;

        // Logika pemisahan Standar vs Custom
        if ($jenis == 'standar') {
            $varian = VarianProduk::findOrFail($request->varian_id);
            $cartKey = 'standar_' . $varian->id; // Kunci unik untuk session
            $harga = $varian->harga_reguler;
            $keterangan = 'Ukuran: ' . $varian->ukuran . ($varian->tinggi ? ' T' . $varian->tinggi . 'cm' : '');
        } else {
            $cartKey = 'custom_' . time(); // Kunci unik pakai waktu agar bisa banyak custom
            $harga = 0; // Harga custom menunggu admin
            $keterangan = 'Custom: ' . $request->catatan_custom;
        }

        // Cek apakah barang standar yang sama sudah ada di keranjang
        if(isset($keranjang[$cartKey]) && $jenis == 'standar') {
            $keranjang[$cartKey]['qty'] += $qty;
        } else {
            // Jika belum ada, buat item baru
            $keranjang[$cartKey] = [
                'produk_id' => $produk->id,
                'nama_produk' => $produk->nama_produk,
                'kategori' => $produk->kategori->nama_kategori ?? 'Umum',
                'jenis' => $jenis,
                'qty' => $qty,
                'harga' => $harga,
                'keterangan' => $keterangan
            ];
        }

        session()->put('keranjang', $keranjang);
        return redirect('/keranjang')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menghapus barang dari keranjang
    public function hapus($id)
    {
        $keranjang = session()->get('keranjang');
        if(isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }
        return redirect('/keranjang');
    }
}