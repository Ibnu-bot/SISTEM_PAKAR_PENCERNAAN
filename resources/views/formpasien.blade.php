@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-center align-items-center" style="background-color: #786AB5;">
                <h1 class="card-title text-white mb-0">Masukan Identitas Anda</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('user.create.pasien') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pasien">Nama</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama"
                            value="{{ old('nama_pasien', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>

                    <div class="form-group">
                        <label for="usia">Usia</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="usia" name="usia" placeholder="Usia"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control input-square" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                    </div>

                    <div class="card-action text-center">
                        <button type="submit" class="btn btn-primary" style="background-color: #786AB5;">Diagnosis</button>
                        <a href="/home" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengatur max date pada input tanggal lahir
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var day = today.getDate().toString().padStart(2, '0');
            var month = (today.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0
            var year = today.getFullYear();
            var maxDate = year + '-' + month + '-' + day;

            // Set max attribute pada input tanggal lahir
            document.getElementById('tanggal_lahir').setAttribute('max', maxDate);
        });

        // Hitung usia berdasarkan tanggal lahir yang dipilih
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
