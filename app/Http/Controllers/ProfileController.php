<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Return view dengan data user
        return view('profile.show', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }
    
            // Upload avatar baru
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $filename, 'public');
    
            // Simpan nama file avatar di database
            $user->avatar = $filename;
        }
    
        // Simpan perubahan ke database
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    
}
