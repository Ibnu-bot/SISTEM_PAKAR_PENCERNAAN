@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="card shadow-sm border-0">
            <div class="text-center mt-3">
                <h3 class="mt-4 mb-4">Silakan Pilih Gejala Di Bawah Ini Untuk Melakukan Diagnosis</h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('proses.cf') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">

                    <div class="row">
                        @foreach ($gejalas as $gejala)
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header text-white">
                                        <strong>{{ $loop->iteration }}. {{ $gejala->nama_gejala }}</strong>
                                    </div>
                                    <div class="card-body">
                                        @foreach ([
                                            'Tidak' => 0.0,
                                            'Tidak Yakin' => 0.2,
                                            'Sedikit Yakin' => 0.4,
                                            'Cukup Yakin' => 0.6,
                                            'Yakin' => 0.8,
                                            'Sangat Yakin' => 1.0
                                        ] as $label => $value)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="gejalas[{{ $gejala->id }}]" id="gejala-{{ $gejala->id }}-{{ $value }}"
                                                    value="{{ $value }}" required>
                                                <label class="form-check-label"
                                                    for="gejala-{{ $gejala->id }}-{{ $value }}">{{ $label }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn text-white px-5 py-2">Diagnosis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .card .card-header {
            background-color: #786AB5;
            font-size: 1rem;
        }

        .btn {
            background-color: #786AB5;
            border-radius: 25px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
        }

        .btn:hover {
            background-color: #473B9D;
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-label {
            margin-left: 10px;
            font-size: 1rem;
            cursor: pointer;
        }

        .card {
            border-radius: 15px;
        }

        h3 {
            font-weight: 600;
            color: #333;
        }
    </style>
@endsection
