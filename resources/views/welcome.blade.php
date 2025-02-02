<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Laravel</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      background: #fff;
    }

    h1 {
      color: #081b29;
      font-size: 100px;
    }
  </style>
</head>

<body>
  <header class="bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-3 px-3">
      <div class="d-flex align-items-center">
        <p class="fs-3 text-dark fw-bolder">Laravel 11 Crud.</p>
      </div>
    </div>
  </header>
  <div class="text-center py-5 mt-5">
    <h1 class="display-4 fw-bold text-black">
      Membuat Projek
      <span class="text-primary">Laravel 11</span>
    </h1>
    <p class="fs-5 text-secondary mt-3">
      Projek yang mengacu pada CRUD
    </p>
    <p class="text-muted mt-2">
      CRUD adalah singkatan dari Create, Read, Update, dan Delete, yang merupakan empat operasi dasar dalam pengelolaan data pada aplikasi.
    </p>
    <form action="{{ route('students.index') }}" method="GET">
      <button class="btn btn-primary mt-4 px-4 py-2">
        Halaman Crud
      </button>
    </form>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
