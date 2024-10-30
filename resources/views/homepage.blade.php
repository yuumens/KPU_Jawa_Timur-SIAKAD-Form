<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registrasi</title>

    <!-- @vite('resources/css/app.css') -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> -->
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

        .dropdown-menu {
            max-height: 200px;
            overflow-y: scroll;
        }

        #btn-close-camera {
            background-color: #dc3545;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        #btn-capture-camera {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }


        #btn-retake-camera {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
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

        .camera-container {
            margin: 15px auto;
            max-width: 320px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #photo-camera {
            max-width: 320px;
            margin: 15px auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .camera-container video {
            display: block;
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

                            <div class="mb-4 mt-4">
                                <label for="gender" class="block text-gray-600 text-sm mb-2">Kabupaten / Kota</label>
                                <select name="gender"
                                    id="gender"
                                    class="select2 text-black w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                                    <option value=""></option>
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
                                    class="select2 text-black w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                                    <option value="" place></option>
                                    @foreach($locationmodel as $location)
                                    <option value="{{ $location->id }}">{{ $location->locations_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tingkat Jabatan Field -->
                            <div class="mb-4 mt-4">
                                <label for="position" class="block text-gray-600 text-sm mb-2">Kabupaten / Kota</label>
                                <select name="position"
                                    id="position"
                                    class="select2 text-black w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                                    <option value="" place></option>
                                    @foreach($positionmodel as $position)
                                    <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-center bg-light-primary rounded border-primary border border-dashed mb-8 mt-4 p-4">
                                <div id="my_camera" class="camera-container" style="display: none;"></div>

                                <div id="photoContainer" class="photo-container" style="display: none;">
                                    <img id="photo-camera" alt="Hasil foto akan muncul di sini">
                                </div>

                                <button
                                    type="button"
                                    class="open-camera_button"
                                    id="btn-open-camera">
                                    Buka Kamera
                                </button>
                                <button
                                    type="button"
                                    id="btn-close-camera"
                                    style="display: none;">Tutup Kamera</button>
                                <button
                                    type="button"
                                    id="btn-capture-camera"
                                    style="display: none;">Ambil Foto</button>
                                <button
                                    type="button"
                                    id="btn-retake-camera"
                                    style="display: none;">Foto Ulang</button>

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
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Pilihan',
                allowClear: false,
                width: '100%',
                minimumResultsForSearch: Infinity
            });
        });

        function getCameraConfig() {
            if (screen.height <= screen.width) {
                return {
                    width: 320,
                    height: 240,
                    crop_width: 240,
                    crop_height: 240,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                };
            } else {
                return {
                    width: 240,
                    height: 320,
                    crop_width: 240,
                    crop_height: 240,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                };
            }
        }

        let currentPhoto = null;

        // Initialize camera functionality
        $(document).ready(function() {

            window.addEventListener('orientationchange', function() {
                if (Webcam.active) {
                    Webcam.reset();
                    Webcam.set(getCameraConfig());
                    Webcam.attach('#my_camera');
                }
            });

            // Open Camera Button
            $('#btn-open-camera').click(function() {
                Webcam.set(getCameraConfig());
                Webcam.attach('#my_camera');

                $('#my_camera').show();
                $('#btn-capture-camera').show();
                $('#btn-close-camera').show();
                $('#btn-open-camera').hide();

                $('#photoContainer').hide();
                $('#btn-delete-camera').hide();
            });

            // Capture Photo Button
            $('#btn-capture-camera').click(function() {
                Webcam.snap(function(data_uri) {
                    currentPhoto = data_uri;

                    $('#photo-camera').attr('src', data_uri);
                    $('#photoContainer').show();
                    $('#btn-delete-camera').hide();
                    $('#btn-retake-camera').show();
                    $('#btn-close-camera').show();

                    $('#my_camera').hide();
                    $('#btn-capture-camera').hide();

                    savePhotoToServer(data_uri);
                });
            });

            // Close Camera Button
            $('#btn-close-camera').click(function() {
                closeCamera();
            });

            $('#btn-retake-camera').click(function() {
                retakePhoto();
            });

            // Delete Photo Button
            $('#btn-delete-camera').click(function() {
                deletePhoto();
            });
        });

        function retakePhoto() {
            currentPhoto = null;
            $('#photo-camera').attr('src', '');
            $('#photoContainer').hide();

            $('#my_camera').show();
            $('#btn-capture-camera').show();
            $('#btn-delete-camera').hide();
            $('#btn-retake-camera').hide();
            $('#btn-close-camera').show();

        }

        //Close Camera Button
        function closeCamera() {
            Webcam.reset();

            $('#my_camera').hide();
            $('#btn-capture-camera').hide();
            $('#btn-close-camera').hide();
            $('#btn-delete-camera').hide();
            $('#btn-retake-camera').hide();
            $('#btn-open-camera').show();

            $('#photoContainer').hide();
            $('#btn-delete-camera').hide();
        }

        //Delete Photo Button
        function deletePhoto() {
            currentPhoto = null;

            $('#photo-camera').attr('src', '');
            $('#photoContainer').hide();
            $('#btn-delete-camera').hide();
            $('#btn-close-camera').hide();
            $('#btn-retake-camera').hide();

            $('#btn-open-camera').show();
        }

        Webcam.on('error', function(err) {
            console.error('Webcam error:', err);
        });
    </script>
</body>

</html>