<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterForm;
use Illuminate\Support\Str;
// use Picqer\Barcode\BarcodeGeneratorPNG;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CetakPesertaController extends Controller
{
    // Menampilkan halaman pencarian
    public function index()
    {
        return view('cetak.index');
    }

    // Mencari peserta berdasarkan nomor HP dan menampilkan halaman cetak
    public function search(Request $request)
    {
        // Validasi input nomor HP
        $request->validate([
            'nomor_hp' => 'required|numeric'
        ]);

        // Cari peserta berdasarkan nomor HP
        $peserta = RegisterForm::where('nomor_hp', $request->input('nomor_hp'))->first();

        // Jika peserta tidak ditemukan, kembalikan dengan pesan error
        if (!$peserta) {
            return redirect()->back()->with('error', 'Peserta dengan nomor HP tersebut tidak ditemukan.');
        }



        //  library lam

        // $uuid = Str::uuid()->toString();
        // $barcode = intval(substr(preg_replace('/\D/', '', sha1($uuid)), 0, 7));

        // new environment
        // Generate UUID dan ambil 7 digit pertama sebagai barcode
        // $uuid = Str::uuid()->toString();
        // $barcode = intval(substr(preg_replace('/\D/', '', sha1($uuid)), 0, 7));
        // $barcodeImage = base64_encode($generator->getBarcode($barcode, $generator::TYPE_CODE_39));

        // Informasi yang akan ditampilkan
        // $nama = $peserta->nama_lengkap;
        $nama = strtoupper($peserta->nama_lengkap);
        $alamat = strtoupper($peserta->tingkat_satker);
        $jabatan = strtoupper($peserta->jabatan);
        $generateid = $nama . $alamat . $jabatan;


        // Generate barcode sebagai gambar PNG base64
        // $generator = new BarcodeGeneratorPNG();
        // $barcodeImage = base64_encode($generator->getBarcode($generateid, $generator::TYPE_CODE_39));

        //  qr code
        // $qrCodeImage = base64_encode(QrCode::format('png')->size(200)->generate($generateid));
        // $qrCodeImage = base64_encode(QrCode::format('svg')->size(200)->generate($generateid));
        $qrCodeImage = QrCode::format('svg')->size(100)->generate($generateid);





        // Tampilkan halaman cetak
        return view('cetak.show', compact('peserta', 'nama', 'qrCodeImage'));
    }
}
