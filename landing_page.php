<?php
require 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nyarter Angkot</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

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
    <!-- section awal -->
    <div class="section">
      <div class="section-awal">
        <div class="container">
          <div class="content-section-awal">
            <div class="row py-4">
              <div class="col-md-8">
                <h1 style="font-size: 80px">Selamat Datang</h1>
                <h1>Anda sedang berada di website Nyarter Angkot</h1>
              </div>
              <div class="col-md-4">
                <img
                  class="img-fluid rounded-start"
                  src="https://4.bp.blogspot.com/-DpeOzt3aii8/VuEhcIPogyI/AAAAAAAADk4/_AqTv2_5PlQ/s1600/angkot.png"
                  alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section awal -->
    <!-- section satu -->
    <div class="section">
      <div class="section-satu">
        <div class="container">
          <div class="content-section-satu">
            <div class="row">
              <div class=" col-sm-12 col-lg-6 mb-3">
                <div
                  class="card text-content"
                  style="
                        text-align: justify;
                        padding: 20px;
                        height: 350px;
                        overflow-y : auto;
                        border-color: rgb(90, 199, 135);
                        background-color: rgb(123, 216, 162);
                        border-radius: 30px">
                  <div class="card-body">
                    <h2>Apa itu Nyarter Angkot ?</h2>
                    <p>
                      Website ini menyediakan platform untuk sewa menyewa
                      angkot di Kota Bandung, memungkinkan supir untuk mempromosikan angkot
                      mereka dengan menginput data secara mudah. Pelanggan
                      dapat dengan cepat menemukan angkot yang mereka butuhkan
                      melalui situs ini. Selain itu, pelanggan memiliki
                      kemudahan untuk menghubungi supir melalui WhatsApp,
                      sehingga mereka dapat berdiskusi dan mencapai
                      kesepakatan secara langsung. Dengan fitur ini, proses
                      penyewaan angkot menjadi lebih praktis dan efisien bagi
                      kedua belah pihak.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6 mb-3">
                <div
                  class="card text-content"
                  style="
                        text-align: justify;
                        padding: 20px;
                        height: 350px;
                        overflow-y : auto;
                        border-color: rgb(90, 199, 135);
                        background-color: rgb(123, 216, 162);
                        border-radius: 30px">
                  <div class="card-body">
                    <h2>Latar Belakang</h2>
                    <p>
                      Website ini lahir dari keresahan masyarakat untuk menyewa angkot
                      untuk kebutuhannya. Dimana masyarakat perlu mencari angkot yang bersedia dicarter dijalanan lansung
                      atau memerlukan seseorang yang mempunyai kenalan supir angkot untuk menyarterkan angkot untuknya.
                      Dengan adanya webiste ini dapat membantu dan mempermudah masyarakat untuk menyarter angkot.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section 1 -->

    <!--  section 2 -->
    <div class="section">
      <div class="section-dua">
        <div class="container">
          <div class="content-section-satu">
            <h1 align="center" style="font-size: 60px; margin-botton : 10px">Cara Memesan</h1>
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <h1 style="font-size: 60px;">1.</h1>
                <h5>Lihat daftar angkot yang siap dicarter <a href="list_angkot.php">disini</a></h5>
              </div>
              <div class="col-sm-6 col-lg-3">
                <h1 style="font-size: 60px;">2.</h1>
                <h5>Lihat detail dari angkot yang dipilih</h5>
              </div>
              <div class="col-sm-6 col-lg-3">
                <h1 style="font-size: 60px;">3.</h1>
                <h5>Hubungi lansung supir melalui whatsapp dengan menekan tombol hijau</h5>
              </div>
              <div class="col-sm-6 col-lg-3">
                <h1 style="font-size: 60px;">4.</h1>
                <h5>Diskusi dan buat janji dengan supir</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section 2 -->

    <!--  section 3 -->
    <div class="section">
      <div
        class="section-dua">
        <div class="container" style="background-color: rgb(123, 216, 162); border-radius: 30px">
          <div class="content-section-satu p-4">
            <div class="col-sm-12" align="center">
              <h1>Prediksi harga</h1>
              <p>
                Anda dapat melihat prediksi harga nyarter angkot sebelum menghubungi supir.
              </p>
              <a class="button btn btn-success" href="calculate.php">Prediksi Disini <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section 3 -->
    <!-- end content -->
  </div>
  <!-- start footer -->
  <footer class="my-footer">
    <address>&copy; 2024 NC - All right reserved</address>
  </footer>
  <!-- end footer -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>