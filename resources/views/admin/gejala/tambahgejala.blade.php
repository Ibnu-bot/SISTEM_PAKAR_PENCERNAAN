@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Form Tambah</h4>
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
                    <a href="#">Gejala</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Gejala</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.gejala') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="form-group">
                        <label for="kode_gejala">Kode Gejala</label>
                        <input type="text" class="form-control" id="kode_gejala" name="kode_gejala"
                            value="{{ old('kode_gejala') }}" placeholder="Kode Gejala">
                    </div>

                    <div class="form-group">
                        <label for="nama_gejala">Nama Gejala</label>
                        <input type="text" class="form-control" id="nama_gejala" name="nama_gejala"
                            value="{{ old('nama_gejala') }}" placeholder="Nama Gejala">
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('gejala.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
