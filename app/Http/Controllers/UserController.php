<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Lakukan validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Buat pengguna baru berdasarkan data yang diterima
        $user = User::create([
            'name' => $validatedData['name'],
            'nomor_hp' => $validatedData['nomor_hp'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Simpan session
        session(['name' => $user->name, 'nomor_hp' => $user->nomor_hp]);
        // Kirim respons berhasil
        return response()->json(['message' => 'User successfully registered'], 201);
    }
}
