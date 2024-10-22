@extends('admin.layouts.app')

@section('content')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Analisis Gejala</h4>
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
                    <a href="#">Perbandingan Gejala</a>
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
                        <form action="{{ route('analisisgejala.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="penyakit_id" value="{{ $penyakit->id }}">
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
                                        @php $urut = 0; @endphp

                                        @for ($x = 0; $x < count($gejalas) - 1; $x++)
                                            @for ($y = $x + 1; $y < count($gejalas); $y++)
                                                @php
                                                    $urut++;
                                                    $nilai =
                                                        \App\Models\AnalisisGejala::where(
                                                            'gejala1_id',
                                                            $gejalas[$x]->id,
                                                        )
                                                            ->where('gejala2_id', $gejalas[$y]->id)
                                                            ->first()->nilai ?? 1;
                                                @endphp
                                                <tr>
                                                    <td class="text-left">
                                                        <div class="field">
                                                            <div class="ui radio checkbox">

                                                                <input name="pilih{{ $urut }}" value="1"
                                                                    checked class="hidden" type="radio">
                                                                <label>{{ $gejalas[$x]->kode_gejala }}</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="field">
                                                            <input class="form-control" type="number"
                                                                name="bobot{{ $urut }}" value="{{ $nilai }}"
                                                                min="1" max="9" required>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input name="pilih{{ $urut }}" value="2"
                                                                    class="hidden" type="radio">
                                                                <label>{{ $gejalas[$y]->kode_gejala }}</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @endfor
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
