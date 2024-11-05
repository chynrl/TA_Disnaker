<?php
require 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Harga</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    h1 {
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #555;
    }

    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    #result {
        margin-top: 15px;
        font-size: 1.2em;
        color: #333;
    }
</style>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg custom-bs-navbar sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="landing_page.php">
        <img
          src="https://4.bp.blogspot.com/-DpeOzt3aii8/VuEhcIPogyI/AAAAAAAADk4/_AqTv2_5PlQ/s1600/angkot.png"
          alt="Bootstrap"
          width="50"
          height="35"
          style="margin-left: 20px" /> Nyarter Angkot
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a
              class="nav-link active"
              aria-current="page"
              href="landing_page.php"><strong>Beranda</strong> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_angkot.php"><strong>Nyarter Lansung</strong> </a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              <strong>Daftar Penyarter</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="authe/register.php">Daftar</a>
              </li>
              <li>
                <a class="dropdown-item" href="authe/login.php">Masuk</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <?php if(isset($_SESSION['email'])):?>
        <div class="dropdown" style="background-color: rgb(90, 199, 135);">
          <a class="btn btn-secondary dropdown-toggle border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent;">
            <img src="./gambar/R.png" alt="User" class="user rounded-circle me-2" style="object-fit: cover; width : 30px; height: 30px;">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="./dashboard/index.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="./authe/logout.php" name="submit_logout">Logout</a></li>
          </ul>
        </div>
        <?php endif?>
    </div>
  </nav>
    <!-- navbar end -->

    <!-- content section -->
    <div class="content-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <a href="landing_page.php" style="color: green;"> <i class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <h1>Prediksi Harga</h1>
                    <p>*prediksi harga sewa ini diambil dari harga ongkos rata-rata angkot per 1 km yaitu Rp 3000.</p>
                    <form id="fareForm" method="POST">
                        <label for="distance">Masukan Jarak (km):</label>
                        <input type="number" id="distance" name="distance" min="0" step="0.1" required>
                        <button type="submit" class="btn btn-success">Hitung</button>
                    </form>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $distance = floatval($_POST['distance']);
                        $rate_per_km = 3000;
                        $fare = $distance * $rate_per_km;
                        echo "<div id='result'>Total Ongkos: Rp " . number_format($fare, 0, ',', '.') . "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <footer class="my-footer">
        <address>&copy; 2024 NC - All right reserved</address>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>