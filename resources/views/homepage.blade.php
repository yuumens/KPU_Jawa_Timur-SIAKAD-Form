<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registrasi</title>

    <!-- @vite('resources/css/app.css') -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #FFAD01;
        }

        img {
            width: 30rem;
            /* height: 4.5rem; */
            margin-left: auto;
            margin-right: auto;
        }

        .title-2 {
            margin-top: 2rem;
            font-size: 2rem;
        }

        .title-3 {
            font-size: 2rem;
        }

        .title-4 {
            margin-bottom: 2.5rem;
        }

        .open-camera_button {
            background-color: #0d6efd;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;

        }

        .submit-button {
            background-color: #198754;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style umum */
        .form-container {
            width: 100%;
            max-width: 100%;
            padding-top: 0 1rem;
        }

        /* Set ukuran form untuk screen lebih besar dari 1024px menjadi 50% */
        @media (min-width: 1024px) {
            .form-container {
                width: 50%;
                margin: 0 auto;
                padding: 2rem 2rem;
                background-color: #fff;
            }
        }

        @media (max-width: 1024px) {
            .main-form-card {
                width: 100%;
                margin: 0 auto;
                padding: 2rem 2rem;
                background-color: #fff;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            background-color: white;
            text-align: center;
            position: relative;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="py-10">
        <div class="max-w-21 mx-auto">
            <!-- Header With Logos -->
            <div class="text-center my-4">
                <img src="{{ asset('img/KPU-Logo.png') }}" alt="LOGO KPU">
                <h1 class="text-white font-bold title-2">PENDAFTARAN PESERTA</h1>
                <h2 class="text-white text-lg mt-2 title-3">
                    Uji Coba Sirekap Pemilihan Tahun 2024
                </h2>
                <h2 class="text-white text-sm mt-2 title-4">
                    Tanggal Kegiatan 4 - 6 November 2024
                </h2>
            </div>

            <!-- Main Form Card-->
            <div class="rounded-lg overflow-hidden ">
                <!-- NIK Field -->
                <div class="p-6 main-form-card">
                    <form action="">
                        @csrf
                        <div class="form-container">
                            <!-- NIK Field -->
                            <div class="mb-4">
                                <label for="identity-number" class="block text-gray-600 text-sm mb-2">NIK</label>
                                <input
                                    type="text"
                                    name="identity-number"
                                    id="identity-number"
                                    placeholder="Nomor KTP (Nomor Induk Kependudukan)"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Nama Lengkap Field -->
                            <div class="mb-4 mt-4">
                                <label for="full-name" class="block text-gray-600 text-sm mb-2">Nama Lengkap</label>
                                <input
                                    type="text"
                                    name="full-name"
                                    id="full-name"
                                    placeholder="Nama Lengkap"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Jenis Kelamin Field -->
                            <div class="mb-4 mt-4">
                                <label for="gender" class="block text-gray-600 text-sm mb-2">Jenis Kelamin</label>
                                <select
                                    name="gender"
                                    id="gender"
                                    placeholder="Nama Lengkap"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>

                                    <option value="">Pilihan</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <!-- Nomor HP Field -->
                            <div class="mb-4 mt-4">
                                <label for="nomor_hp" class="block text-gray-600 text-sm mb-2">Nomor HP</label>
                                <input type="text"
                                    name="nomor_hp"
                                    id="nomor_hp"
                                    placeholder="Nomor seluler aktif (Format: 08xxxxxxxxx)"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4 mt-4">
                                <label for="email" class="block text-gray-600 text-sm mb-2">E-mail</label>
                                <input type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Alamat email aktif (Format: xxxx@xxxx.xxx)"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Tingkat Satker Field -->
                            <div class="mb-4 mt-4">
                                <label for="location" class="block text-gray-600 text-sm mb-2">Kabupaten / Kota</label>
                                <select name="location"
                                    id="location"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                                    <option value="">Pilihan</option>
                                    <option value="pusat">Pusat</option>
                                    <option value="provinsi">Provinsi</option>
                                    <option value="kabupaten">Kabupaten/Kota</option>
                                </select>
                            </div>

                            <!-- Jabatan Field -->
                            <div class="mb-4 mt-4">
                                <label for="role" class="block text-gray-600 text-sm mb-2">Jabatan</label>
                                <select name="role"
                                    id="role"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                                    <option value="">Pilihan</option>
                                    <option value="ketua">Ketua</option>
                                    <option value="anggota">Anggota</option>
                                    <option value="sekretaris">Sekretaris</option>
                                </select>
                            </div>

                            <!-- Camera Button -->
                            <div class="text-center mb-6 mt-6">
                                <button type="button"
                                    class="open-camera_button"
                                    id="openCameraButton">
                                    Buka Kamera
                                </button>
                            </div>

                            <!-- Modal Kamera -->
                            <div id="cameraContainer" class="camera-container" style="display: none;">
                                <video id="cameraVideo" autoplay></video>
                                <button type="button" id="takePhotoButton">Ambil Foto</button>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="submit-button">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- <script src="{{ asset('js/camera.js') }}"></script> -->
</body>

</html>