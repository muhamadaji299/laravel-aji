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
            <a href="{{ route('welcome') }}" class="btn btn-success">Excel</a>
        </div>
        <form action="/" method="GET" class="d-flex">
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
                <td>Foto</td>
                <td>{{ $student->hobi }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
