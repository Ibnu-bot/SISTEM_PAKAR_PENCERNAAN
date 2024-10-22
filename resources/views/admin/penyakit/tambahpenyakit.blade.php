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
                    <a href="#">Penyakit</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Penyakit</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('penyakit.store') }}" method="POST">
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
                        <label for="kode_penyakit">Kode Penyakit</label>
                        <input type="text" class="form-control input-square" id="kode_penyakit" name="kode_penyakit"
                            placeholder="Kode Penyakit">
                    </div>

                    <div class="form-group">
                        <label for="nama_penyakit">Nama Penyakit</label>
                        <input type="text" class="form-control input-square" id="nama_penyakit" name="nama_penyakit"
                            placeholder="Nama Penyakit">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control input-square" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="penanganan">Penanganan</label>
                        <textarea class="form-control input-square" id="penanganan" name="penanganan" placeholder="Penanganan"></textarea>
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('penyakit.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
