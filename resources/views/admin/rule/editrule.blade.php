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
                    <a href="#">Rule</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data Rule</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('rule.update', $rule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_penyakit">Pilih Penyakit</label>
                        <select class="form-control" name="id_penyakit" required>
                            <option value="">Pilih Penyakit</option>
                            @foreach ($penyakit as $item)
                                <option value="{{ $item->id }}" {{ $rule->id_penyakit == $item->id ? 'selected' : '' }}>
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
                                <option value="{{ $item->id }}" {{ $rule->id_gejala == $item->id ? 'selected' : '' }}>
                                    [{{ $item->kode_gejala }}] - {{ $item->nama_gejala }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cf_pakar" class="form-label">CF Pakar</label>
                        <input type="text" class="form-control" id="cf_pakar" name="cf_pakar"
                            value="{{ $rule->cf_pakar }}">
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
