<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk fungsi login/logout
use Illuminate\Support\Facades\Hash; // Untuk enkripsi password
use App\Models\User; // Panggil model User

class AuthController extends Controller
{
    // 1. Tampilkan Halaman Login
    public function login()
    {
        return view('auth.login');
    }

    // 2. Proses Pengecekan Data Login
    public function authenticate(Request $request)
    {
        // Validasi inputan form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek apakah user mencentang checkbox "Remember Me"
        $remember = $request->has('remember');

        // Coba login! Auth::attempt otomatis mengecek email dan password ke database
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate(); // Cegah serangan hacker (session fixation)
            return redirect()->intended('/dashboard'); // Jika sukses, arahkan ke halaman dashboard
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // 3. Tampilkan Halaman Register
    public function register()
    {
        return view('auth.register');
    }

    // 4. Proses Simpan User Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        // UBAH BARIS INI: Lempar ke login dan bawa pesan sukses
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login menggunakan akun Anda.');
    }

    // 5. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login'); // Kembali ke form login
    }
}