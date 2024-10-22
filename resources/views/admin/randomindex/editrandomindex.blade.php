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
                    <a href="#">Random Index</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Random Index</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('randomindex.update', $randomindex->id) }}" method="POST">
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
                        <label for="jumlah">Jumlah</label>
                        <input type="number" step="0.0001" class="form-control" id="jumlah" name="jumlah"
                            value="{{ $randomindex->jumlah }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" step="0.0001" class="form-control" id="nilai" name="nilai"
                            value="{{ $randomindex->nilai }}" required>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('randomindex.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
