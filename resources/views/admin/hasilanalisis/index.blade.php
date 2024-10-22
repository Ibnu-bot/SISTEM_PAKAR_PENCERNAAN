@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Hasil Analisis</h4>
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
                    <a href="#">Hasil Analisis</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card mb-4 text-center">
                            <h3 class="mt-3">Nilai Prioritas Penyakit</h3>
                            <hr>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-head-bg-secondary" id="dataTablePenyakit">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penyakit</th>
                                                <th>Nama Penyakit</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($prioritaspenyakit as $penyakit)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $penyakit->penyakit->kode_penyakit }}</td>
                                                    <td>{{ $penyakit->penyakit->nama_penyakit }}</td>
                                                    <td>{{ $penyakit->nilai }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @foreach ($prioritaspenyakit as $penyakit)
                            <div class="card mb-4 text-center">
                                {{-- <div class="card-header text-center"> --}}
                                <h3 class="mt-3">Nilai Prioritas Gejala Untuk Penyakit
                                    {{ $penyakit->penyakit->nama_penyakit }}</h3>
                                <hr>
                                {{-- </div> --}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-head-bg-secondary" id="dataTableGejala">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Gejala</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($prioritasgejala->where('penyakit_id', $penyakit->penyakit_id) as $gejala)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $gejala->gejala->kode_gejala }}</td>
                                                        <td>{{ $gejala->nilai }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
