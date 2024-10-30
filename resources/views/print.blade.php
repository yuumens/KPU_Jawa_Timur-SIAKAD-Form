<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cetak Name Tag</title>

    <!-- @vite('resources/css/app.css') -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <style>
        body {
            background-color: #FFAD01;
        }

        img {
            width: 30rem;
            margin-left: auto;
            margin-right: auto;
        }

        .title-2 {
            margin-top: 2rem;
            font-size: 2rem;
        }

        .title-3 {
            font-size: 2rem;
            line-height: 1;
        }

        .title-4 {
            margin-bottom: 2.5rem;
        }

        .print-button {
            background-color: #0d6efd;
            color: #fff;
            padding: 10px 5rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button {
            background-color: #198754;
            color: #fff;
            padding: 10px 5rem;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 2rem;
        }

        .back-button-container {
            margin-top: 4rem;
        }

        .form-container {
            width: 100%;
            max-width: 100%;
            padding-top: 0 1rem;
        }

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
    </style>
</head>

<body>
    <div class="py-10">
        <div class="max-w-21 mx-auto">
            <!-- Header With Logos -->
            <div class="text-center my-4">
                <img src="{{ asset('img/KPU-Logo.png') }}" alt="LOGO KPU">
                <h1 class="text-white font-bold title-2">CETAK NAME TAG PESERTA</h1>
                <h2 class="text-white text-lg mt-2 title-3">
                    Bimbingan Teknis Pemantapan Penggunaan Aplikasi SIREKAP <br>
                    Dan Ujicoba Sirekap Pemilihan Tahun 2024
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
                                <label for="nomor_hp" class="block text-gray-600 text-sm mb-2">Nomor HP</label>
                                <input
                                    type="text"
                                    name="nomor_hp"
                                    id="nomor_hp"
                                    placeholder="Masukkan Nomor HP"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>

                            <div class="text-center mt-8">
                                <a href="/cetak" class="print-button">Cari</a>
                            </div>

                            <div class="text-center back-button-container ">
                                <a href="/" class="back-button">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>