<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Laravel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')   }}">
    <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body{
    background: #fff;
}
h1{
    color:#081b29;
    font-size: 100px;
}
        </style>
</head>
<body> 
<header class="bg-white shadow-md">
   <div class="container mx-auto flex justify-between items-center py-3 px-9">
    <div class="flex items-center">
    <p class="fs-3 text-dark fw-bolder ">Laravel 11 Crud.</p>
    </div>
   </div>
  </header>
  <div class="text-center p-6 relative mt-11"> <!-- Tambahkan kelas mt-12 untuk memberi jarak -->
   <h1 class="text-5xl md:text-7xl font-bold text-black leading-tight">
   Membuat Projek
    <span class="text-blue-600">
    Laravel 11
    </span>
   </h1>
   <p class="text-xl md:text-2xl text-gray-800 mt-4">
   Projek yg mengacu pada crud
   </p>
   <p class="text-gray-600 mt-2">
   CRUD adalah singkatan dari Create, Read, Update, dan Delete, yang merupakan empat operasi dasar dalam pengelolaan data pada aplikasi. 
   </p>
   <form action="{{ route('students.index')}}" method="GET">
   <button class="mt-6 px-6 py-3 bg-primary text-white rounded-full text-lg flex items-center justify-center mx-auto">
   Halaman Crud
   </button>
   </form>
  </div>
</body>

   
 </head>
 
</html>