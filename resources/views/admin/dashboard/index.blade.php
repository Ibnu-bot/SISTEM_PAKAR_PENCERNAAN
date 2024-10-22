@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard Admin</h4>
            </div>
            <div class="welcome-section">
                <div class="welcome-message">
                    <h3>Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p>Ini adalah dashboard admin Anda. Anda dapat melihat statistik dan informasi penting di sini.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Data Users -->
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('users.index') }}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Users</p>
                                            <h4 class="card-title">{{ $jumlahUser }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Data Gejala -->
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('gejala.index') }}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fas fa-allergies"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Gejala</p>
                                            <h4 class="card-title">{{ $jumlahGejala }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Data Penyakit -->
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('penyakit.index') }}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fas fa-flushed"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Penyakit</p>
                                            <h4 class="card-title">{{ $jumlahPenyakit }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .welcome-section {
            background: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .welcome-message {
            text-align: center;
        }

        .welcome-message h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .welcome-message p {
            font-size: 16px;
            color: #555;
        }

        .card-stats {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .card-stats .card-body {
            padding: 20px;
        }

        .card-stats .icon-big {
            font-size: 36px;
            color: #fff;
            background-color: #007bff;
            border-radius: 50%;
            padding: 20px;
        }

        .card-stats .numbers {
            text-align: right;
        }

        .card-stats .card-category {
            font-size: 12px;
            color: #888;
        }

        .card-stats .card-title {
            font-size: 24px;
            font-weight: bold;
        }

    </style>
@endsection
