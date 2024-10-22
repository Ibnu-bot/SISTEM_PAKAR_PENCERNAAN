@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Gejala</h4>
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
                    <a href="#">Gejala</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">Table Data Gejala</h3>
                        <div class="mt-4">
                            <form action="{{ route('tambahgejala.index') }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Gejala</th>
                                        <th>Nama Gejala</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($gejala as $gejala)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $gejala->kode_gejala }}</td>
                                            <td>{{ $gejala->nama_gejala }}</td>
                                            
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('gejala.edit', $gejala->id) }}" data-toggle="tooltip"
                                                        title="Edit" class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('gejala.destroy', $gejala->id) }}" method="POST"
                                                        class="form-delete" id="form{{ $gejala->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" data-toggle="tooltip" title="Hapus"
                                                            class="btn btn-link btn-danger btn-delete"
                                                            data-id="{{ $gejala->id }}" data-original-title="Hapus">
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
@endsection
