<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home'; // Atur sesuai kebutuhan

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Tampilkan formulir pendaftaran.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Tangani permintaan pendaftaran.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Tangani unggahan avatar
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            // Validasi ulang jika diperlukan
            $request->validate([
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Simpan file avatar di folder 'public/avatars'
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
        ]);

        // Login pengguna
        $this->guard()->login($user);

        // Redirect setelah registrasi
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Validator untuk data pendaftaran.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
    }
}
