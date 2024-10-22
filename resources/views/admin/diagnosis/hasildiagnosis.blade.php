@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Hasil Diagnosis</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Penyakit Pencernaan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
            </ul>
        </div>

        <!-- Biodata Pasien -->
        <div class="card mb-4">
            <h3 class="card-header mx-3">Biodata Pasien</h3>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="150px">Nama</td>
                        <td>: {{ $pasien->nama_pasien }}</td>
                    </tr>
                    <tr>
                        <td width="150px">Tanggal Lahir</td>
                        <td>: {{ $pasien->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td>: {{ $pasien->usia }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $pasien->alamat }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Hasil Diagnosis dan 3 Hasil Diagnosa Teratas -->
        <div class="card mb-3 p-3">
            <h3 class="card-header text-center font-weight-bold">Hasil Diagnosis</h3>
            <div class="card-body">
                <!-- Bagian Hasil Diagnosis -->
                @if (session()->has('invalid_diagnosis') && session('invalid_diagnosis') == true)
                    <div class="alert alert-warning text-center">
                        <h4>Penyakit tidak valid</h4>
                        <p>Silakan untuk melakukan diagnosis ulang!</p>
                    </div>
                    <div class="text-center mb-4">
                        <a href="/admin/diagnosis/pilihgejala" class="btn btn-warning">Diagnosis Ulang</a>
                    </div>
                @else
                    <div class="row mb-4">
                        @foreach ($hasil_diagnosis as $index => $hasil)
                            @php
                                $colClass = '';
                                if (count($hasil_diagnosis) == 1) {
                                    $colClass = 'col-md-12';
                                } elseif (count($hasil_diagnosis) == 2) {
                                    $colClass = 'col-md-6';
                                } else {
                                    $colClass = 'col-md-4';
                                }
                            @endphp
                            <div class="{{ $colClass }}">
                                <div class="card mb-5 border shadow-sm rounded-lg">
                                    <div class="card-body text-center">
                                        <div
                                            class="circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3">
                                            <h1 class="mb-0">{{ $hasil['persentasi'] }}%</h1>
                                        </div>
                                        <h5 class="card-title font-weight-bold">{{ $hasil['nama_penyakit'] }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($pasien->penyakit)
                            <h3 class="text-center mt-4">Kemungkinan Anda Mengalami Penyakit
                                <b><u>{{ $pasien->penyakit->nama_penyakit }}</u></b> Sebesar
                                <b>{{ $pasien->persentasi }}%</b>
                            </h3>
                        @else
                            <h3 class="text-center mt-4">Tidak ada penyakit yang terdeteksi.</h3>
                        @endif
                    </div>

                    <!-- Deskripsi dan Penanganan -->
                    @if ($pasien->penyakit)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3 border shadow-sm rounded-lg">
                                    <h3 class="card-header bg-secondary text-white text-center">Deskripsi Penyakit</h3>
                                    <div class="card-body">
                                        <p>{{ $pasien->penyakit->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card mb-3 border shadow-sm rounded-lg">
                                    <h3 class="card-header bg-secondary text-white text-center">Penanganan</h3>
                                    <div class="card-body">
                                        <p>{{ $pasien->penyakit->penanganan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Gejala yang Dipilih -->
                    <div class="card mb-5 border shadow-sm rounded-lg">
                        <h3 class="card-header bg-secondary text-white text-center">Gejala yang Dipilih</h3>
                        <div class="card-body">
                            <ul>
                                @foreach ($gejala as $g)
                                    @if ($g->nilai_cf != 0)
                                        <li>{{ $g->gejala->nama_gejala }} (Nilai CF: {{ $g->nilai_cf }})</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="text-center mb-2">
                        <a href="{{ route('diagnosis.cetakpdf', $pasien->id) }}" target="_blank"
                            class="btn btn-primary">Cetak PDF</a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Selesai</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            font-size: 2rem;
            font-weight: bold;
        }

        .card-title {
            font-size: 1.25rem;
        }

        .card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
