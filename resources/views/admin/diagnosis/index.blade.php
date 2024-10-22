@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Form Identitas Pasien</h4>
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
                    <a href="#">Identitas Pasien</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Masukan Identitas Pasien</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('create.pasien') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            max="{{ date('Y-m-d', strtotime('2024-12-31')) }}">
                    </div>

                    <div class="form-group">
                        <label for="usia">Usia</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="usia" name="usia" placeholder="Usia" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control input-square" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-secondary">Diagnosis</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var day = today.getDate().toString().padStart(2, '0');
            var month = (today.getMonth() + 1).toString().padStart(2, '0');
            var year = today.getFullYear();
            var maxDate = year + '-' + month + '-' + day;

            document.getElementById('tanggal_lahir').setAttribute('max', maxDate);
        });

        document.getElementById('tanggal_lahir').addEventListener('change', function() {
            var birthDate = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('usia').value = age;
        });
    </script>
@endsection
