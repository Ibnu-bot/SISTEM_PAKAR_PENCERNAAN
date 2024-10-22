@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Form Edit</h4>
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
                <h3 class="card-title">Edit Data Penyakit</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('penyakit.update', $penyakit->id) }}" method="POST">
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

                    @method('PUT')
                    <div class="form-group">
                        <label for="kode_penyakit">Kode Penyakit</label>
                        <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit"
                            value="{{ $penyakit->kode_penyakit }}" placeholder="Kode Penyakit">
                    </div>

                    <div class="form-group">
                        <label for="nama_penyakit">Nama Penyakit</label>
                        <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit"
                            value="{{ $penyakit->nama_penyakit }}" placeholder="Nama Penyakit">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"> {{ $penyakit->deskripsi }} </textarea>
                    </div>

                    <div class="form-group">
                        <Label for="penanganan">Penanganan</Label>
                        <textarea class="form-control" id="penanganan" name="penanganan" Placeholder="Penanganan">{{ $penyakit->penanganan }} </textarea>
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
