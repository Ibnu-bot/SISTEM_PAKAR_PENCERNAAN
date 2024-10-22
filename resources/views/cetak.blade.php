<!DOCTYPE html>
<html lang="id">

<head>
    <title>Review Hasil Diagnosis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            font-size: 14px;
            margin: 20px;
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h3,
        .header h4 {
            margin: 5px 0;
        }

        .section-header {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }

        .bg-light-red {
            background-color: #f8d7da;
        }

        .text-end-center {
            text-align: center;
            float: right;
            width: 250px;
        }

        .signature {
            text-align: center;
            margin-top: 20px;
        }

        .signature p {
            margin: 2px 0;
        }

        .bold {
            font-weight: bold;
        }

        .info-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .info-box h6 {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .bg-light {
            background-color: #f8f9fa;
        }

        .p-2 {
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h3>HASIL DIAGNOSIS</h3>
        <h4>GEJALA PENYAKIT PENCERNAAN</h4>
        <hr>
    </div>

    <div class="section">
        <h6 class="section-header">Biodata Pasien</h6>
        <table class="table table-borderless">
            <tr>
                <th width="150px">Nama</th>
                <td>: {{ $pasien->nama_pasien }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>: {{ $pasien->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Usia</th>
                <td>: {{ $pasien->usia }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: {{ $pasien->alamat }}</td>
            </tr>
            <tr>
                <th>Waktu Diagnosa</th>
                <td>: {{ $pasien->created_at }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach ($hasil_diagnosis as $index => $hasil)
                        <th class="text-center bg-light-red">{{ $hasil['nama_penyakit'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($hasil_diagnosis as $index => $hasil)
                        <td class="text-center">{{ $hasil['persentasi'] }}%</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section text-center">
        <h3>Kemungkinan Anda Mengalami Penyakit <b><u>{{ $pasien->penyakit->nama_penyakit }}</u></b> Sebesar
            <b>{{ $pasien->persentasi }}%</b>
        </h3>
    </div>

    <div class="section">
        <h6 class="section-header">Deskripsi dan Penanganan Penyakit</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <h6 class="bg-light p-2">Deskripsi {{ $pasien->penyakit->nama_penyakit }}</h6>
                    <p>{{ $pasien->penyakit->deskripsi }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <h6 class="bg-light p-2">Penanganan Untuk {{ $pasien->penyakit->nama_penyakit }}</h6>
                    <p>{{ $pasien->penyakit->penanganan }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="section">
        <h6 class="section-header">Gejala yang Dipilih</h6>
        <ul>
            @foreach ($gejala as $g)
                @if ($g->nilai_cf != 0)
                    <li>{{ $g->gejala->nama_gejala }} (Nilai CF: {{ $g->nilai_cf }})</li>
                @endif
            @endforeach
        </ul>
    </div> --}}

    <div class="signature">
        <p>Telah Divalidasi Oleh</p>
        <p class="bold">Dokter Umum</p>
        <br>
        <br>
        <p class="bold">dr.Tedy Achyar</p>
        <p>NIP. 19760212 201001 1 005</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
