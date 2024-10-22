@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Analisis Hierarki Perbandingan Gejala</h4>
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
                        <h3 class="card-title text-center">Form Perbandingan Gejala</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Perbandingan Gejala</h5>
                        <p class="card-text">Silakan pilih penyakit di bawah ini untuk memulai perbandingan gejala yang
                            diinginkan.</p>
                        <form class="ui form" action="{{ route('analisisgejala.index') }}" method="GET">
                            <div class="form-group">
                                <label for="squareSelect"></label>
                                <select class="form-control input-square" id="squareSelect" name="penyakit_id" required>
                                    <option value="">Pilih Penyakit</option>
                                    @foreach ($penyakits as $penyakit)
                                        <option value="{{ $penyakit->id }}">{{ $penyakit->nama_penyakit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-secondary" type="submit">Pilih</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
