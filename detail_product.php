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
      <a class="navbar-brand" href="#">
        <img
          src="https://4.bp.blogspot.com/-DpeOzt3aii8/VuEhcIPogyI/AAAAAAAADk4/_AqTv2_5PlQ/s1600/angkot.png"
          alt="Bootstrap"
          width="50"
          height="35"
          style="margin-left: 20px" />
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
            <a class="nav-link active" aria-current="page" href="./index.html">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Gallery.html">Nyarter Lansung</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              Daftar Penyarter
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="register.html">Daftar</a>
              </li>
              <li>
                <a class="dropdown-item" href="login.html">Masuk</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar end -->

  <!-- content section -->
  <div class="content-section">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
          <div class="col-sm-6">
            <div id="carouselExampleIndicators" class="carousel slide">
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
            </div>
            
        </div>
        <div class="col-sm-6">
          <a href="list_produk.php"> <i class="fa-solid fa-arrow-left"></i> Kembali</a>
          <div class="col-12 my-8">
              <h2>Angkot Trayeknya</h2>
              <p>Plat nomer : </p>
              <p>Nama Supir : </p>
              <p>Masa Pajak : </p>
              <p>Alamat Garasi : </p>
              <hr>
              <p>deskrispsi</p>

              <button type="button" class="btn btn-success my-3"> <i class="fa-brands fa-whatsapp"></i> Sewa Sekarang</button>



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