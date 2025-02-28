@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Edit Data Siswa</h2>

        <!-- Menampilkan pesan sukses atau error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
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

        <!-- Form untuk mengedit data siswa -->
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nis" class="form-label fw-bold">NIS</label>
                <input type="number" name="nis" id="nis" class="form-control" value="{{ old('nis', $student->nis) }}" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $student->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label fw-bold">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $student->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label fw-bold">No HP</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $student->no_hp) }}" required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ $student->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $student->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="hobi" class="form-label fw-bold">Hobi</label>
                <input type="text" name="hobi" id="hobi" class="form-control" value="{{ old('hobi', $student->hobi) }}" required>
            </div>

            <div class="mb-4">
                <label for="foto" class="form-label fw-bold">Upload Foto</label>
                @if($student->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto {{ $student->nama }}" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                @endif
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                <img id="preview" class="img-thumbnail mt-3 d-none" style="max-width: 200px;">
            </div>

            <button type="button" class="btn btn-warning mt-1" data-bs-toggle="modal" data-bs-target="#confirmEditModal">
                Update Data
            </button>
            <div class="modal fade" id="confirmEditModal" tabindex="-1" aria-labelledby="confirmEditModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmEditModalLabel">Konfirmasi Edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin mengedit data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">Ya, Edit</button>
                        </div>
                    </div>
                </div>
            </div>
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
@endsection
