<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nametag - {{ $peserta->nama_lengkap }}</title>
    <style>
        /* Tampilan umum untuk layar */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .nametag-container {
            width: 373px;
            height: 680px;
            background-image: url('{{ asset("storage/photos/idcard.svg") }}');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .nametag-header {
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .nametag-subheader {
            font-size: 12px;
            margin-bottom: 20px;
        }

        .nametag-photo {
            width: 150px;
            height: 150px;
            background-color: #e0e0e0;
            margin: 0 auto;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            font-size: 14px;
            border-radius: 5px;
        }

        .nametag-info {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;

        }

        .nametag-barcode {
            margin-top: 20px;
            /* background-color: white; */
            padding: 5px;
            border-radius: 5px;
            color: #333;
        }

        /* Tombol Cetak - Hanya tampil di layar */
        .print-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .nametag-direction {
            margin-top: 200px;
        }

        /* Tampilan khusus untuk mode cetak */
        @media print {

            /* Sembunyikan tombol cetak di tampilan cetak */
            .print-button {
                display: none;
            }

            /* Pengaturan tampilan cetak khusus */
            .nametag-container {
                width: 373px;
                height: 680px;
                background-image: url('{{ asset("storage/photos/idcard.svg") }}');
                /* Ubah gambar untuk mode cetak */
                background-size: cover;
                background-position: center;
                /* background: linear-gradient(to bottom, #a30000, #870000); */
                border-radius: 10px;
                color: white;
                padding: 20px;
                text-align: center;
                position: relative;
            }

            .nametag-direction {
                margin-top: 200px;
            }


            .nametag-header,
            .nametag-subheader {
                color: black;
            }

            * {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="nametag-container">
        <div class="nametag-direction">
            <div class="nametag-photo">
                @if($peserta->photo)
                <img
                    src="{{ asset($peserta->photo) }}"
                    alt="Photo Peserta"
                    width="150" />
                @else Foto @endif
            </div>
            <div class="nametag-info"> {{ $peserta->nama_lengkap }}</div>
            <div class="nametag-info">{{ $peserta->jabatan }}</div>
            <div class="nametag-info">
                {{ $peserta->tingkat_satker }}
            </div>
            {{-- <div class="nametag-barcode">
                <img
                    src="data:image/png;base64,{{ DNS1D::getBarcodePNG($barcode, 'C39') }}"
            alt="barcode" />
            <p>{{ $barcode }}</p>
        </div> --}}
        {{-- library baru bar code --}}
        {{-- <div class="nametag-barcode">
                <img src="data:image/png;base64,{{ $barcodeImage }}" alt="barcode" />
        <p>{{ $nama }}</p>
    </div> --}}

    {{-- <div class="nametag-barcode">
                <img src="data:image/png;base64,{{ $qrCodeImage }}" alt="QR Code" style="width: 200px; height: auto;" />
    <p>{{ $nama }}</p>
    </div> --}}
    <div class="nametag-barcode">
        {!! $qrCodeImage !!}
    </div>



    </div>


    <!-- Tombol cetak untuk tampilan layar -->
    <button class="print-button" onclick="window.print()">Cetak</button>
    </div>
</body>

</html>