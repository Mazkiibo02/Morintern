<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\PesertaCalon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredPesertaController extends Controller
{
    /**
     * Show register form
     */
    public function create()
    {
        return view('peserta.auth.register');
    }

    /**
     * Store new peserta registration
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:peserta_calon,email'],
            'no_telp' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $peserta = PesertaCalon::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'password'     => Hash::make($request->password), // pastikan DIHASH
            'no_telp'      => $request->no_telp,
            'github'       => '-', 
            'linkedin'     => '-', 
            'tanggal_mulai'    => now(),
            'tanggal_selesai'  => now(),
            'kelompok_id'      => 0,
            'cv'               => '-',
            'surat'            => '-',
        ]);

        event(new Registered($peserta));

        return redirect()
            ->route('peserta.login')
            ->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
