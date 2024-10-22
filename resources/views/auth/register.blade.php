@extends('auth.layouts.app')

@section('content')
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Daftar Akun</h3>
            <div class="text-center mt-4 font-weight-bold">
                <h4>Sistem Pakar Diagnosis Penyakit Pencernaan</h4>
            </div>
            <div class="login-form">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="placeholder"><b>Nama</b></label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password (minimal 8 karakter)</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="placeholder"><b>Confirm Password</b></label>
                        <div class="position-relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row form-action">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-secondary w-100 fw-bold">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
