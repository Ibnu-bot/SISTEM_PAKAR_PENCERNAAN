@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Analisis Penyakit</h4>
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
                    <a href="#">Perbandingan Penyakit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">Form Perbandingan Penyakit</h3>
                    </div>
                    <div class="card-body">
                        <form class="ui form" action="{{ route('analisispenyakit.store') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <table class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Pilih yang lebih penting</th>
                                            <th class="text-center">Nilai perbandingan</th>
                                            <th class="text-right">Pilih yang lebih penting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $urut = 0;
                                        @endphp

                                        @if ($penyakit && count($penyakit) > 1)
                                            @for ($x = 0; $x < count($penyakit) - 1; $x++)
                                                @for ($y = $x + 1; $y < count($penyakit); $y++)
                                                    @if (isset($penyakit[$x]) && isset($penyakit[$y]))
                                                        @php
                                                            $urut++;
                                                            $nilai =
                                                                \App\Models\AnalisisPenyakit::where(
                                                                    'penyakit1',
                                                                    $penyakit[$x]->id,
                                                                )
                                                                    ->where('penyakit2', $penyakit[$y]->id)
                                                                    ->first()->nilai ?? 1;
                                                        @endphp
                                                        <tr>
                                                            <td class="text-left">
                                                                <div class="field">
                                                                    <div class="ui radio checkbox">
                                                                        <input name="pilih{{ $urut }}"
                                                                            value="1" checked class="hidden"
                                                                            type="radio">
                                                                        <label>{{ $penyakit[$x]->nama_penyakit }}</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="field">
                                                                    <input class="form-control" type="number"
                                                                        name="bobot{{ $urut }}"
                                                                        value="{{ $nilai }}" min="1"
                                                                        max="9" required>
                                                                </div>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="field">
                                                                    <div class="ui radio checkbox">
                                                                        <input name="pilih{{ $urut }}"
                                                                            value="2" class="hidden" type="radio">
                                                                        <label>{{ $penyakit[$y]->nama_penyakit }}</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endfor
                                            @endfor
                                        @else
                                            <tr>
                                                <td colspan="3">Data penyakit tidak mencukupi untuk perbandingan.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <button class="btn btn-secondary" type="submit" name="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
