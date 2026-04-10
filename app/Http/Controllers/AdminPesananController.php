<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class AdminPesananController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan, urutkan dari yang terbaru, dan bawa relasi data pelanggannya (user)
        $pesanan = Pesanan::with('user')->latest()->get();
        
        return view('admin.pesanan.index', compact('pesanan'));
    }
}