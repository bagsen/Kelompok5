<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .banner{
          background: url("motor5.jpg" ) 
          no-repeat center center;
          background-size: cover;
          padding-top: 20%;
          padding-bottom: 22%;
          color: white
        }

        .Kontak{
          background: url("https://wallpaperaccess.com/full/1867010.jpg") 
          no-repeat center center;
          background-size: cover;
          padding-top: 20%;
          padding-bottom: 22%;
          color: white
        }

    </style>
  </head>
  <body>
    <!-- navigasi -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Markas45Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Markas45Project</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard_Login.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Service.php">Paket Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="TentangKami_Login.php">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Keluar</a>
          </li>
      </div>
    </div>
  </div>
</nav>
<!-- banner -->
<div class="container-fluid banner">
  <div class="container text-center">
    <h2 class="display-1">AUTO REPAIR SERVICES</h2>
    <a href="service.php"></a>
    <button type="button" class="btn btn-danger btn-lg">Cek Layanan</button>
  </div>
</div>
<!-- layanan -->
<div class="container fluid layanan pt-5 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-5">Tentang Kami</h2>
          <div class="row pt-4 gx-4 gy-4">
            <div class="col-md-4">
            <div class="card">
            <img src="motor.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">About</h5>
              <p class="card-text">Markas45Project adalah bengkel otomotif yang berkomitmen memberikan pelayanan terbaik untuk kendaraan Anda. Bengkel kami dilengkapi dengan fasilitas modern dan tim mekanik profesional yang siap menangani berbagai jenis perbaikan dan perawatan kendaraan.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
            <div class="card">
            <img src="motor3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Visi</h5>
              <p class="card-text">Memberikan Pelayanan Berkualitas Tinggi: Menyediakan pelayanan perbaikan dan perawatan kendaraan yang cepat, akurat, dan andal untuk memastikan kendaraan pelanggan selalu dalam kondisi prima.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
            <div class="card">
            <img src="motor4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Misi</h5>
              <p class="card-text">Memberikan Pelayanan Berkualitas Tinggi: Menyediakan pelayanan perbaikan dan perawatan kendaraan yang cepat, akurat, dan andal untuk memastikan kendaraan pelanggan selalu dalam kondisi prima.</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Hubungi Kami -->
 <div class="container-fluid Kontak pt-5 pb-5">
  <div class="container">
    <h3 class="display-6">Hubungi Kami</h3>
    <div class="container text-center">
  <div class="row pt-3 gx-3 gy-3">
    <div class="col">
      <h4>Jam Buka</h4>
      Senin - Minggu :     09.00 - 18.00
    </div>
    <div class="col order-1">
      <h4>Kontak</h4>
      Telepon:   085953772866
    </div>
    <div class="col order-5">
      <h4>Lokasi</h4>
      Jl. Lap. Koni I No.57, RT.2/RW.2, Pancoran MAS, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16436
    </div>
  </div>
</div>
  </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>