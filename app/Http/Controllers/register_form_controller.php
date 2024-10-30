<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registerform;

class register_form_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('registration.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:registrations',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_hp' => 'required|string|regex:/^08[0-9]{8,11}$/',
            'email' => 'required|email|unique:registrations',
            'tingkat_satker' => 'required|in:pusat,provinsi,kabupaten',
            'jabatan' => 'required|in:ketua,anggota,sekretaris',
        ]);

        registerform::create($validated);

        return redirect()->route('registration.success')
            ->with('success', 'Pendaftaran berhasil dilakukan!');
    }
}
