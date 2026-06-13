<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function show(Lomba $lomba)
    {
        return view('lomba.show', compact('lomba'));
    }

    public function daftar(Request $request, Lomba $lomba)
    {
        $validated = $request->validate([
            'nama_peserta'        => 'required|string|max:255',
            'asal_sekolah'        => 'required|string|max:255',
            'kelas'               => 'nullable|string|max:50',
            'email'               => 'required|email',
            'no_hp'               => 'required|string|max:20',
            'nama_guru_pembimbing'=> 'nullable|string|max:255',
        ], [
            'nama_peserta.required' => 'Nama peserta wajib diisi.',
            'asal_sekolah.required' => 'Asal sekolah wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'no_hp.required'        => 'No HP wajib diisi.',
        ]);

        $validated['lomba_id'] = $lomba->id;

        Pendaftaran::create($validated);

        return redirect()->back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi kamu segera.');
    }
}
