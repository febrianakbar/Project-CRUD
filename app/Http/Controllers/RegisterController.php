<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register'); // Pastikan Anda sudah membuat view 'auth.register'
    }

    // Menghandle pendaftaran user
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Pastikan password dan konfirmasi cocok
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->route('auth.register')
                ->withErrors($validator)
                ->withInput();
        }

        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        // Redirect setelah berhasil registrasi
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
