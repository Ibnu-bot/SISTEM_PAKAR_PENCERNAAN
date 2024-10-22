@extends('auth.layouts.app')

@section('content')
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">
                <span class="text-secondary font-weight-bold">SELAMAT DATANG</span>
            </h3>
            <div class="text-center mt-4 font-weight-bold">
                <h4>Sistem Pakar Diagnosis Penyakit Pencernaan</h4>
            </div>
            <div class="login-form">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="text"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" required>

                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <div class="d-flex justify-content-between w-100">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme" name="remember">
                                <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                            </div>
                            {{-- <a href="#" class="link">Lupa Password?</a> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary w-100 fw-bold">Masuk</button>
                    </div>
                    <div class="login-account">
                        <span class="msg">Apakah Anda Sudah Mempunyai Akun?</span>
                        <a href="{{ route('register') }}" id="show-signup" class="link">Daftar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
