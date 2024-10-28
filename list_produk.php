<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Angkot</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="./style.css" />
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

      <div class="list-produk col-sm-8 offset-sm-2">
        <h1 style="font-size: 40px; text-align : center;"> <strong>DAFTAR ANGKOT</strong> </h1>
        <form class="d-flex mb-3" role="search">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">
            Search
          </button>
        </form>
        <div class="row">
          <div class=col-8>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img
                    src="./gambar/example.png"
                    class="img-fluid rounded-start"
                    alt="..."
                    style="height: auto; object-fit :cover; display: flex;" />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Trayek Angkot</h5>
                    <div class="mb-3">
                      <h6>Alamat Garasi :</h6>
                      <p>jalan-jalan ae</p>
                    </div>
                    <a href="" class="btn btn-success">Lihat Detail</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <div class="p-2">
              <h6>Filter Trayek</h6>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              </div>
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