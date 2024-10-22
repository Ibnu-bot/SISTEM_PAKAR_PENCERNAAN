@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Analytical Hierarchy Process</h4>
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
                    <a href="#">Analisis Perbandingan Penyakit</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Matriks Perbandingan Berpasangan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Penyakit</th>
                                @foreach ($penyakit as $item)
                                    <th>{{ $item->nama_penyakit }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @for ($x = 0; $x < $n; $x++)
                                <tr>
                                    <td>{{ $penyakit[$x]->nama_penyakit }}</td>
                                    @for ($y = 0; $y < $n; $y++)
                                        <td>{{ number_format($matrik[$x][$y], 3) }}</td>
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
                <h5 class="mb-0">Matriks Nilai Penyakit</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Penyakit</th>
                                @foreach ($penyakit as $item)
                                    <th>{{ $item->nama_penyakit }}</th>
                                @endforeach
                                <th>Jumlah</th>
                                <th>Nilai Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($x = 0; $x < $n; $x++)
                                <tr>
                                    <td>{{ $penyakit[$x]->nama_penyakit }}</td>
                                    @for ($y = 0; $y < $n; $y++)
                                        <td>{{ number_format($matrikb[$x][$y], 3) }}</td>
                                    @endfor
                                    <td>{{ number_format($jmlmnk[$x], 3) }}</td>
                                    <td>{{ number_format($np[$x], 3) }}</td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Principe Eigen Vector (λ maks)</th>
                                <th>{{ number_format($eigenvektor, 3) }}</th>
                            </tr>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Consistency Index</th>
                                <th>{{ number_format($consIndex, 3) }}</th>
                            </tr>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Consistency Ratio</th>
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
                    <a href="{{ route('analisispenyakit.index') }}" class="btn btn-primary mt-4" style="float: right;">
                        Lanjut <i class="bx bx-arrow-right"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
