<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Menangani pendaftaran pengguna
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin', // Validasi role
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi avatar
        ]);

        try {
            // Upload avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            // Buat pengguna baru
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role, // Pastikan role disimpan dengan benar
                'avatar' => $avatarPath, // Simpan path avatar
            ]);

            return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['avatar' => 'Gagal mengunggah avatar: ' . $e->getMessage()]);
        }
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani login pengguna
    public function login(Request $request)
    {
        // Validasi data login
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Proses login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Selamat datang!');
        }

        return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Menangani logout pengguna
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }

    // Menampilkan daftar pengguna
    public function userList()
    {
        $users = User::all(); // Ambil semua pengguna
        return view('user.list', compact('users')); // Kembalikan tampilan user list
    }
}
