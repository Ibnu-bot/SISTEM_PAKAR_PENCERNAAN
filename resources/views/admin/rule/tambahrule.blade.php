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
                    <a href="#">Rule</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Rule</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.rule') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_penyakit">Pilih Penyakit</label>
                        <select class="form-control" name="id_penyakit" required>
                            <option value="">Pilih Penyakit</option>
                            @foreach ($penyakit as $item)
                                <option value="{{ $item->id }}">
                                    [{{ $item->kode_penyakit }}] - {{ $item->nama_penyakit }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_gejala">Pilih Gejala</label>
                        <select class="form-control" name="id_gejala" required>
                            <option value="">Pilih Gejala</option>
                            @foreach ($gejala as $item)
                                <option value="{{ $item->id }}">
                                    [{{ $item->kode_gejala }}] - {{ $item->nama_gejala }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cf_pakar" class="form-label">CF Pakar</label>
                        <input type="text" class="form-control" id="cf_pakar" name="cf_pakar">
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('rule.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
