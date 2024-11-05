<?php
require 'connection.php';
session_start();

$data_trayek = myquery("SELECT * FROM tb_trayek");
$conditions = [];

if (isset($_GET['search']) && !empty($_GET['search'])) {
  $search = $_GET['search'];
  $conditions[] = "(a.garasi LIKE '%$search%' OR t.kode_trayek LIKE '%$search%' OR t.nama_trayek LIKE '%$search%')";
}

if (isset($_GET['trayek']) && !empty($_GET['trayek'])) {
  $trayek_filter = implode("','", $_GET['trayek']);
  $conditions[] = "t.id_trayek IN ('" . $trayek_filter . "')";
}

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $limit) - $limit : 0;

$query_total = "SELECT COUNT(*) AS total FROM tb_angkot as a 
                INNER JOIN tb_trayek as t ON a.trayek = t.id_trayek";
if (count($conditions) > 0) {
  $query_total .= " WHERE " . implode(' AND ', $conditions);
}
$total_result = mysqli_query($conn, $query_total);
$total = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total / $limit);

$query = "SELECT a.id_angkot, a.plat_nomer, a.masa_pajak, a.deskripsi, a.garasi, 
          t.kode_trayek, t.nama_trayek
          FROM tb_angkot as a
          INNER JOIN tb_trayek as t ON a.trayek = t.id_trayek";
if (count($conditions) > 0) {
  $query .= " WHERE " . implode(' AND ', $conditions);
}
$query .= " LIMIT $start, $limit";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}
?>




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
      <?php if (isset($_SESSION['email'])): ?>
        <div class="dropdown" style="background-color: rgb(90, 199, 135);">
          <a class="btn btn-secondary dropdown-toggle border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent;">
            <img src="./gambar/R.png" alt="User" class="user rounded-circle me-2" style="object-fit: cover; width : 30px; height: 30px;">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="./dashboard/index.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="./authe/logout.php" name="submit_logout">Logout</a></li>
          </ul>
        </div>
      <?php endif ?>
    </div>
  </nav>
  <!-- navbar end -->

  <!-- content section -->
  <div class="content-section">
    <div class="container">

      <div class="list-produk col-sm-8 offset-sm-2">
        <h1 style="font-size: 40px; text-align : center;"> <strong>DAFTAR ANGKOT</strong> </h1>
        <form class="d-flex mb-3" role="search" method="GET" action="list_angkot.php">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
            name="search"
            value="<?php if (isset($_GET['search'])) {
                      echo $_GET['search'];
                    } ?>" />
          <button class="btn btn-outline-success" type="submit">
            Search
          </button>
        </form>


        <div class="row">
          <div class=col-8>
            <?php if (count($data) > 0): ?>
              <?php foreach ($data as $row): ?>
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img
                        src="./gambar/example.png"
                        class="img-list img-fluid rounded-start"
                        alt="..."
                        style="height: auto; object-fit :cover; display: flex; align-items: center" />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?= $row['kode_trayek'] . " " . $row['nama_trayek'] ?></h5>
                        <div class="mb-3">
                          <h6>Alamat Garasi : </h6>
                          <p><?= $row['garasi'] ?></p>
                        </div>
                        <a href="detail_angkot.php?id_angkot=<?= $row['id_angkot'] ?>" class="btn btn-success">Lihat Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            <?php else : ?>
              <p>Data tidak ditemukan</p>
            <?php endif ?>
            <nav aria-label="Page navigation example" class="mt-auto">
              <ul class="pagination">
                <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?page=<?= $page - 1; ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>&trayek=<?= isset($_GET['trayek']) ? implode(',', $_GET['trayek']) : ''; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>&trayek=<?= isset($_GET['trayek']) ? implode(',', $_GET['trayek']) : ''; ?>">
                      <?= $i; ?>
                    </a>
                  </li>
                <?php endfor; ?>

                <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?page=<?= $page + 1; ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>&trayek=<?= isset($_GET['trayek']) ? implode(',', $_GET['trayek']) : ''; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>

          </div>

          <div class="col-4">
            <div class="card">
              <div class="p-2">
                <form action="list_angkot.php" method="GET">
                  <button class="btn btn-success btn-sm mb-3" type="submit">Filter Trayek</button>
                  <div class="form-check">
                    <?php foreach ($data_trayek as $option): ?>
                      <input class="form-check-input" type="checkbox" name="trayek[]"
                        id="trayek<?= $option['id_trayek'] ?>"
                        value="<?= $option['id_trayek'] ?>"
                        <?php if (isset($_GET['trayek']) && in_array($option['id_trayek'], $_GET['trayek'])) echo 'checked'; ?>>
                      <label class="form-check-label" for="flexCheckDefault"><?= $option['nama_trayek'] ?></label>
                    <?php endforeach; ?>
                  </div>
                </form>
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