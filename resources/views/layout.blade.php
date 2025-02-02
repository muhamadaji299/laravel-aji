<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
 #preview {
            max-width: 300px;
            max-height: 300px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
     const imageInput = document.getElementById('foto');
        const previewImage = document.getElementById('preview');

        // Tambahkan event listener ketika ada file yang dipilih
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Ambil file yang dipilih
            if (file) {
                const reader = new FileReader();

                // Ketika file selesai dibaca
                reader.onload = function(e) {
                    previewImage.src = e.target.result; // Atur src gambar dengan hasil file
                    previewImage.style.display = 'block'; // Tampilkan gambar
                };

                reader.readAsDataURL(file); // Baca file sebagai URL data
            } else {
                previewImage.style.display = 'none'; // Sembunyikan gambar jika tidak ada file
            }
        });
    </script>
</body>
</html>
