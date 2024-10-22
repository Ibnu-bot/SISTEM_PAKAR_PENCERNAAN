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
                <div class="card">
                    <div class="card-header" style="background:#786AB5;">
                        <h3 class="card-title text-center text-white">
                            <i class="fas fa-file-medical-alt"></i> Riwayat Diagnosis
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-hover text-center mt-3 mb-3">
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
                                        <th class="text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_pasien }}</td>
                                            <td>{{ $data->tanggal_lahir }}</td>
                                            <td>{{ $data->usia }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->penyakit->nama_penyakit }}</td>
                                            <td>{{ $data->persentasi }}%</td>
                                            <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('diagnosis.cetakpdf', $data->id) }}" target="_blank"
                                                        class="btn btn-link btn-primary" data-toggle="tooltip" title="Cetak">
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                    <form action="{{ route('data.diagnosis.destroy', $data->id) }}" method="POST"
                                                        class="form-delete" id="form{{ $data->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" data-toggle="tooltip" title="Hapus"
                                                            class="btn btn-link btn-danger btn-delete"
                                                            data-id="{{ $data->id }}" data-original-title="Hapus">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-white {
            color: #fff !important;
        }

        .thead-secondary {
            background-color: #786AB5 !important;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }

        .card-header h3 {
            margin: 0;
        }

        .fas {
            margin-right: 10px;
        }
    </style>
@endsection
