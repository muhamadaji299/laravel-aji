@extends('layout')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Terjadi Kesalahan!</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Tambah Data Siswa</h2>
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nis" class="form-label fw-bold">NIS</label>
                <input type="number" name="nis" id="nis" class="form-control" placeholder="Masukkan NIS" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required></textarea>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label fw-bold">No HP</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No HP" required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="hobi" class="form-label fw-bold">Hobi</label>
                <input type="text" name="hobi" id="hobi" class="form-control" placeholder="Masukkan Hobi" required>
            </div>

            <div class="mb-4">
                <label for="foto" class="form-label fw-bold">Upload Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
                <small class="text-muted">Upload foto dalam format JPEG/PNG (maksimal 2MB).</small>
                <img id="preview" class="img-thumbnail mt-3 d-none" style="max-width: 200px;">
            </div>

            <button type="submit" class="btn btn-primary mt-1">Simpan Data</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary mt-1">Kembali</a>
        </form>
    </div>
</div>

<script>
    document.getElementById('foto').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        }
    });
</script>




</div>
@endsection