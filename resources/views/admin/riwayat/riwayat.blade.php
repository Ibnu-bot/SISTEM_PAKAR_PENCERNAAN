@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Riwayat Diagnosis</h4>
            <ul class="breadcrumbs centered">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Riwayat Diagnosis</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-header" style="background:#786AB5;">
                    <h2 class="text-center text-white"><i class="fas fa-file-medical-alt"></i> Riwayat Diagnosis</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center mx-auto">
                            <thead class="thead-secondary">
                                <tr>
                                    <th class="text-white">No</th>
                                    <th class="text-white">Nama Pasien</th>
                                    <th class="text-white">Tanggal Lahir</th>
                                    <th class="text-white">Usia</th>
                                    <th class="text-white">Alamat</th>
                                    <th class="text-white">Nama Penyakit</th>
                                    <th class="text-white">Persentase</th>
                                    <th class="text-white">Tanggal Diagnosis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pasien->nama_pasien }}</td>
                                        <td>{{ $pasien->tanggal_lahir }}</td>
                                        <td>{{ $pasien->usia }}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td>{{ $pasien->penyakit->nama_penyakit }}</td>
                                        <td>{{ $pasien->persentasi }}%</td>
                                        <td>{{ $pasien->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-white {
            color: #fff !important;
        }

        .table {
            margin: auto;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .thead-secondary {
            background-color: #786AB5 !important;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }

        .card-header h2 {
            margin: 0;
            padding: 10px 0;
        }

        .fas {
            margin-right: 10px;
        }
    </style>
@endsection
