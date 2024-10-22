@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5 mt-5 text-white">
                    <div class="card-header">
                        <h2 class="text-center">Riwayat Diagnosis</h2>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered text-center mx-auto">
                                <thead class="thead-secondary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Usia</th>
                                        <th>Alamat</th>
                                        <th>Nama Penyakit</th>
                                        <th>Persentase</th>
                                        <th>Tanggal Diagnosis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasiens as $data)
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
                                                <a href="{{ route('user.diagnosis.cetak', $data->id) }}" class="btn btn-primary btn-sm" target="_blank">Cetak PDF</a>
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
@endsection

<style>

    .text-white {
        color: #fff !important;
    }
    .table {
        margin: auto;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .thead-secondary {
        background-color: #343a40 !important;
    }
</style>
