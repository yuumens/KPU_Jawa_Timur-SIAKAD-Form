<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterForm; // Model yang sesuai
use Illuminate\Support\Facades\Storage;

class PendaftaranPesertaController extends Controller
{
    /**
     * Handle the form submission.
     */
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     // Validasi input
    //     // $request->validate([
    //     //     'identity-number' => 'required|numeric|unique:users_form,nik',
    //     //     'full-name' => 'required|string|max:255',
    //     //     'gender' => 'required|string',
    //     //     'nomor_hp' => 'required|numeric|unique:users_form,nomor_hp',
    //     //     'email' => 'required|email|unique:users_form,email',
    //     //     'location' => 'required|string',
    //     //     'position' => 'required|string',
    //     //     'photo' => 'required|base64image', // Atur validasi base64 image
    //     // ]);

    //     $request->validate([
    //         'identity-number' => 'required|numeric|unique:users_form,nik',
    //         'full-name' => 'required|string|max:255',
    //         'gender' => 'required|string',
    //         'nomor_hp' => 'required|numeric',
    //         'email' => 'required|email',
    //         'location' => 'required',
    //         'position' => 'required',
    //         'photo_blob' => 'required',  // Validasi gambar
    //     ]);

    //     if ($request->hasFile('photo_blob')) {
    //         $photo = $request->file('photo_blob');
    //         $photoName = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
    //         $photoPath = $photo->storeAs('public/photos', $photoName);
    //     }
    //     // Simpan data
    //     $peserta = new RegisterForm();
    //     $peserta->nik = $request->input('identity-number');
    //     $peserta->nama_lengkap = $request->input('full-name');
    //     $peserta->jenis_kelamin = $request->input('gender');
    //     $peserta->nomor_hp = $request->input('nomor_hp');
    //     $peserta->email = $request->input('email');
    //     $peserta->location_id = $request->input('location');
    //     $peserta->position_id = $request->input('position');
    //     $peserta->photo_path = $photoPath;  // Path foto tersimpan
    //     $peserta->save();

    //     // Simpan foto
    //     // if ($request->has('photo')) {
    //     //     $photoData = $request->input('photo');
    //     //     $photoName = 'photo_' . time() . '.jpg';
    //     //     $photoPath = 'public/photos/' . $photoName;

    //     //     Storage::put($photoPath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoData)));

    //     //     // Simpan path foto
    //     //     $peserta->photo = $photoPath;
    //     // }

    //     // Simpan data ke database
    //     $peserta->save();

    //     return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    // }
    public function store(Request $request)
    {

        try {
            // Validasi data form
            // dd($request->all());
            $request->validate([
                'identity-number' => 'required|numeric|unique:users_form,nik',
                'full-name' => 'required|string|max:255',
                'gender' => 'required|string',
                'nomor_hp' => 'required|numeric',
                'email' => 'required|email',
                'location' => 'required',
                'position' => 'required',
                'photo_blob' => 'required',  // Set menjadi nullable jika foto bisa optional
            ]);

            // Ambil nama location berdasarkan ID
            $location = \App\Models\locationmodel::find($request->input('location'));
            $position = \App\Models\positionmodel::find($request->input('position'));


            // Inisialisasi variabel untuk path foto
            $photoPath = null;

            // Jika ada data Base64 pada photo_blob
            if ($request->input('photo_blob')) {
                $photoBlob = $request->input('photo_blob');

                // Konversi Base64 menjadi file
                $photoPath = $this->saveBase64Image($photoBlob, 'public/photos');
            }


            // Simpan data peserta lainnya ke database
            $peserta = new RegisterForm();
            $peserta->nik = $request->input('identity-number');
            $peserta->nama_lengkap = $request->input('full-name');
            $peserta->jenis_kelamin = $request->input('gender');
            $peserta->nomor_hp = $request->input('nomor_hp');
            $peserta->email = $request->input('email');
            $peserta->tingkat_satker = $location->locations_name;
            $peserta->jabatan = $position->position_name;
            $peserta->photo = $photoPath;  // Tetap gunakan $photoPath, walaupun null
            $peserta->save();

            return redirect()->back()->with('success', 'Pendaftaran berhasil!');
        } catch (\Exception $e) {
            // Jika gagal, set flash message error
            return redirect()->back()->with('error', 'Pendaftaran gagal: ' . $e->getMessage());
        }
    }
    private function saveBase64Image($base64Image, $path)
    {
        // Buat direktori jika belum ada
        if (!file_exists(storage_path('app/' . $path))) {
            mkdir(storage_path('app/' . $path), 0755, true);
        }

        // Konversi Base64 ke file
        list($type, $data) = explode(';', $base64Image);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        // Tentukan nama file berdasarkan timestamp
        $fileName = 'photo_' . time() . '.jpg';

        // Simpan file di storage Laravel (public)
        $filePath = storage_path('app/' . $path . '/' . $fileName);
        file_put_contents($filePath, $data);

        // Return path relatif dari file yang disimpan
        return 'storage/photos/' . $fileName;
    }
}
