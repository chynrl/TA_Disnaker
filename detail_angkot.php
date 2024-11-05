<?php
require 'connection.php';
session_start();

if (isset($_GET['id_angkot'])) {
  $id_angkot = $_GET["id_angkot"];
} else {
  echo "ID tidak ditemukan";
}

$data = "SELECT a.id_angkot, a.plat_nomer, a.masa_pajak, a.deskripsi, a.garasi, t.kode_trayek, t.nama_trayek, d.nama, d.no_wa, a.img_angkot 
    FROM tb_angkot as a 
    join tb_trayek as t on a.trayek = t.id_trayek 
    join tb_drivers as d on a.id_drivers = d.id_drivers
    where id_angkot = $id_angkot
    ";
$res = mysqli_query($conn, $data);
$tampil = mysqli_fetch_array($res);

$pesan_wa = "Hallo Pak, saya berminat menyarter angkot, bisakah kita berdiskusi dulu?";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="./style.css" />
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
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <!-- <div id="carouselExampleIndicators" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="contoh.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="contoh.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="contoh.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div> -->
              <div class="card" style="width: 600px; height: 400px;">
                <img src="./uploaded_images/<?php echo $tampil['img_angkot']; ?>" class="img-fluid rounded" alt="gambar angkot" style="height: 100%; width: 100%; object-fit :cover; display: flex;">
              </div>
            </div>
            <div class="col-sm-12 col-lg-6">
              <a href="list_angkot.php" style="color: green;"> <i class="fa-solid fa-arrow-left"></i> Kembali</a>
              <div class="col-sm-12 my-8">
                <form action="" method="GET">
                  <h2><?= $tampil['kode_trayek'] . " " . $tampil['nama_trayek']; ?></h2>
                  <p>Plat nomer : <?= $tampil['plat_nomer']; ?></p>
                  <p>Nama Supir : <?= $tampil['nama']; ?></p>
                  <p>Masa Pajak : <?= $tampil['masa_pajak']; ?></p>
                  <p>Alamat Garasi : <?= $tampil['garasi']; ?></p>
                  <hr>
                  <p>Deskrispsi</p>
                  <p><?= $tampil['deskripsi']; ?></p>

                  <a type="button" class="btn btn-success my-3"
                    href=<?php echo 'https://wa.me/' . $tampil['no_wa'] . '?text=' . urlencode($pesan_wa); ?> target="_blank">
                    <i class="fa-brands fa-whatsapp"></i> Sewa Sekarang</a>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
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