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
                    <a href="#">Users</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data Users</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $users->id) }}" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger pb-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control input-square" id="name" name="name" placeholder="Nama" value="{{ $users->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control input-square" id="email" name="email" placeholder="Email" value="{{ $users->email }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control input-square" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control input-square" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control input-square" id="role" name="role">
                            <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $users->role == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
