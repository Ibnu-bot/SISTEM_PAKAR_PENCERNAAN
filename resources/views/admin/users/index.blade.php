@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Users</h4>
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
                    <a href="#">Users</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">Table Data User</h3>
                        <div class="mt-4">
                            <form action="{{ route('tambahusers.index') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-hover text-center mt-3 mb-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $users)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->email }}</td>

                                            <td>{{ $users->role }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('users.edit', $users->id) }}" data-toggle="tooltip"
                                                        title="Edit" class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $users->id) }}" method="POST"
                                                        class="form-delete" id="form{{ $users->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" data-toggle="tooltip" title="Hapus"
                                                            class="btn btn-link btn-danger btn-delete"
                                                            data-id="{{ $users->id }}" data-original-title="Hapus">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('deleteButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Hapus Data?',
                text: "Apakah kamu yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Melakukan DELETE request
                    fetch('/endpoint-delete', {
                            method: 'DELETE'
                        }).then(response => response.json())
                        .then(data => {
                            Swal.fire('Berhasil!', 'Data telah dihapus.', 'success');
                        }).catch(error => {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        });
                }
            });
        });
    </script>
@endsection
