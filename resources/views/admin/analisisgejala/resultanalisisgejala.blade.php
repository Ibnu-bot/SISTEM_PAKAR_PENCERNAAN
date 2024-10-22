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
                        <h5 class="mb-0">Matriks Perbandingan Berpasangan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Gejala</th>
                                        @foreach ($gejalas as $gejala)
                                            <th>{{ $gejala->kode_gejala }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < $n; $i++)
                                        <tr>
                                            <td>{{ $gejalas[$i]->kode_gejala }}</td>
                                            @for ($j = 0; $j < $n; $j++)
                                                <td>{{ number_format($matrik[$i][$j], 3) }}</td>
                                            @endfor
                                        </tr>
                                    @endfor
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Jumlah</th>
                                        @for ($i = 0; $i < $n; $i++)
                                            <th>{{ number_format($jmlmpb[$i], 3) }}</th>
                                        @endfor
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Matriks Bobot Perbandingan Berpasangan (B)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Gejala</th>
                                        @foreach ($gejalas as $gejala)
                                            <th>{{ $gejala->kode_gejala }}</th>
                                        @endforeach
                                        <th>Jumlah</th>
                                        <th>Priority Vector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($x = 0; $x < $n; $x++)
                                        <tr>
                                            <td>{{ $gejalas[$x]->kode_gejala }}</td>
                                            @for ($y = 0; $y < $n; $y++)
                                                <td>{{ number_format($matrikb[$x][$y], 3) }}</td>
                                            @endfor
                                            <td>{{ number_format($jmlmnk[$x], 3) }}</td>
                                            <td>{{ number_format($pv[$x], 3) }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="{{ $n + 2 }}">Eigenvektor (λ maks)</th>
                                        <th>{{ number_format($eigenvektor, 3) }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="{{ $n + 2 }}">Consistency Index (CI)</th>
                                        <th>{{ number_format($consIndex, 3) }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="{{ $n + 2 }}">Consistency Ratio (CR)</th>
                                        <th>{{ number_format($consRatio * 100, 3) }} %</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        @if ($consRatio > 0.1)
                            <div class="alert alert-danger mt-4" role="alert">
                                <h5 class="alert-heading">Nilai Consistency Ratio melebihi 10% !!!</h5>
                                <p>Mohon input kembali tabel perbandingan...</p>
                            </div>
                            <a href='javascript:history.back()' class="btn btn-primary">
                                <i class="bx bx-arrow-back"></i> Kembali
                            </a>
                        @else
                            <a href="/admin/select-penyakit" class="btn btn-secondary mt-4" style="float: right;">
                                Lanjut <i class="bx bx-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
