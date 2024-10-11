<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        // Pastikan hanya admin yang dapat mengakses halaman ini
        $this->authorize('viewAny', User::class); // Pastikan UserPolicy sudah di-set up

        $users = User::all(); // Fetch all users
        return view('user.list', compact('users')); // Pass users to the view
    }

    // Menampilkan form untuk menambahkan pengguna baru
    public function create()
    {
        return view('user.create'); // View untuk membuat pengguna baru
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin', // Validasi role
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi avatar
        ]);

        // Handle avatar jika ada file diupload
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatar = time() . '.' . $avatarFile->getClientOriginalExtension();
            $avatarFile->storeAs('avatars', $avatar, 'public');
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password
            'role' => $request->role,
            'avatar' => $avatar, // Simpan nama file avatar jika diupload
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit(User $user)
    {
        $this->authorize('update', $user); // Pastikan hanya admin yang bisa mengedit
        return view('user.edit', compact('user')); // View untuk mengedit pengguna
    }

    // Memperbarui data pengguna
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user); // Pastikan hanya admin yang bisa mengedit

        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Unique kecuali untuk pengguna yang sama
            'role' => 'required|in:user,admin',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi avatar jika diupload
        ]);

        // Handle avatar jika ada file diupload
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }

            // Upload avatar baru
            $avatarFile = $request->file('avatar');
            $avatar = time() . '.' . $avatarFile->getClientOriginalExtension();
            $avatarFile->storeAs('avatars', $avatar, 'public');

            // Update data pengguna dengan avatar baru
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'avatar' => $avatar,
            ]);
        } else {
            // Update data tanpa mengubah avatar
            $user->update($request->only('name', 'email', 'role'));
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        $this->authorize('delete', $user); // Pastikan hanya admin yang bisa menghapus
        
        // Hapus avatar dari storage jika ada
        if ($user->avatar) {
            Storage::disk('public')->delete('avatars/' . $user->avatar);
        }
        
        // Hapus pengguna
        $user->delete(); // Hapus pengguna
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
