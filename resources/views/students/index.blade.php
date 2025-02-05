<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1 class="text-center">CRUD LARAVEL AJI</h1>
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="{{ route('welcome') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Data</a>
                <a href="{{ route('export-students') }}" class="btn btn-success">Excel</a>
            </div>
            <form action="{{ route('students.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari Data Anda..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Hobi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>{{ $student->no_hp }}</td>
                    <td>{{ $student->jenis_kelamin }}</td>
                    <td>{{ $student->hobi }}</td>
                    <td><img src="{{ asset('storage/' . $student->foto) }}" alt="Foto {{ $student->nama }}"
                            alt="Foto {{ $student->nama }}" style="width: 100px; height: auto;"></td>
                    <td>
                        <!-- Tombol Edit -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#confirmEditModal">
                        <a href="{{ route('students.edit', $student->id) }}" class="text-white text-decoration-none">Edit</a>
                        </button>
                 

                        <!-- Tombol Hapus -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                            Hapus
                        </button>
                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>