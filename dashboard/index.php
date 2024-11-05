<?php
session_start();
require '../connection.php';

if (!isset($_SESSION['email'])) {
  header("Location: ../authe/login.php");
  exit();
}

$id_login = $_SESSION['id__users'];
$nama_pengguna = $_SESSION['username'];

$id_driver_query = "SELECT * FROM tb_drivers WHERE id_users = '$id_login'";
$id_driver_result = mysqli_query($conn, $id_driver_query);
$data = mysqli_fetch_assoc($id_driver_result);

if ($data) {
  $data_drivers = myquery("SELECT *, id_users FROM tb_drivers WHERE id_users = $id_login");

  if (count($data_drivers) > 0) {
    $query_angkot = "SELECT a.id_angkot, a.plat_nomer, a.garasi, a.masa_pajak, a.deskripsi, t.kode_trayek, t.nama_trayek 
                         FROM tb_angkot AS a 
                         JOIN tb_trayek AS t ON a.trayek = t.id_trayek 
                         WHERE a.id_drivers = (SELECT id_drivers FROM tb_drivers WHERE id_users = $id_login)";

    if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = mysqli_real_escape_string($conn, $_GET['search']);
     $searchConditions = [
        "a.plat_nomer LIKE '%$search%'",
        "a.garasi LIKE '%$search%'",
        "a.masa_pajak LIKE '%$search%'",
        "a.deskripsi LIKE '%$search%'",
        "t.kode_trayek LIKE '%$search%'",
        "t.nama_trayek LIKE '%$search%'"
      ];

      $query_angkot .= " AND (" . implode(' OR ', $searchConditions) . ")";
    }

    // $limit = 10; 
    // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    // $offset = ($page - 1) * $limit;

    // $total_data_query = "SELECT COUNT(*) AS total FROM tb_angkot WHERE id_drivers = (SELECT id_drivers FROM tb_drivers WHERE id_users = $id_login)";
    // $total_data_result = mysqli_query($conn, $total_data_query);
    // $total_data_row = mysqli_fetch_assoc($total_data_result);
    // $total_data = $total_data_row['total'];

    // $total_pages = ceil($total_data / $limit);

    // $query_angkot .= " LIMIT $limit OFFSET $offset";

    $data_angkot_result = mysqli_query($conn, $query_angkot);

    if ($data_angkot_result && mysqli_num_rows($data_angkot_result) > 0) {
      $data_angkot = mysqli_fetch_all($data_angkot_result, MYSQLI_ASSOC);
    } else {
      $data_angkot = []; 
    }
  } else {
    header("Location: form_driver.php");
    exit();
  }
} else {
  header("Location: form_driver.php");
  exit();
}

$no = 1;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="index.css" />
 
</head>

<body style="background-color: rgb(237, 255, 242);">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg custom-bs-navbar" style="background-color: rgb(90, 199, 135);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><strong>Dashboard Nyater Angkot</strong> </a>
      <div class="col-md-3 ms-auto" align="end">
        <div class="dropdown" style="background-color: rgb(90, 199, 135);">
          <a class="btn btn-secondary dropdown-toggle border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent;">
            <img src="../gambar/R.png" alt="User" class="user rounded-circle me-2">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="../landing_page.php">Beranda</a></li>
            <li><a class="dropdown-item" href="../authe/logout.php" name="submit_logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </nav>
  <!-- end navbar -->



  <div class="container py-4">
    <div class="row">
      <!-- Profil -->
      <div class="col-sm-3">
        <div class="card text-center card-dashboard" style="padding: 0px">
          <div class="card-body">
            <h4 class="card-title">Profil</h4>
            <div class="row">
              <div class="d-flex justify-content-center align-items-center">
                <img src="./driver-silhouette.jpg" class="img-fluid card-img-top rounded-circle" alt="..." style="width: 200px; height: 200px;">
              </div>

              <div class="card-body">
                <h5 class="card-title" name="nama"><?= $data_drivers[0]['nama'] ?></h5>
                <a href="form_driver.php?id_drivers=<?= $data_drivers[0]['id_drivers']; ?>" class="btn btn-secondary" type="submit" name="submit_update">Edit Profil</a>
                <div class="content-profil text-start">
                  <p name="usia"><strong>Usia: </strong> <?= $data_drivers[0]['usia'] ?> </p>
                  <p name="no_wa"><strong>No Whatsapp :</strong> <?= $data_drivers[0]['no_wa'] ?></p>
                  <p name="alamat"><strong>Alamat :</strong> <?= $data_drivers[0]['alamat'] ?> </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end profil -->

      <!-- Angkot -->
      <div class="col-sm-9">
        <div class="card card-dashboard" style="padding : 0px;">
          <div class="card-body">
            <h4 class="card-title text-center">Daftar Angkot</h4>
            <div class="table-responsive">
              <div class="row">
                <a href="form_angkot.php?id_drivers=<?= $data_drivers[0]['id_drivers']; ?>" class="btn btn-success float-start mb-2"><i class="fa-solid fa-plus"></i> Tambah data</a>
                <div class="col-md-10 ">
                  <form class="search-container" role="search" method="GET">
                    <input class="form-control me-2" id="form_search" type="search" placeholder="Search" name="search"
                      aria-label="Search"
                      value="<?php if (isset($_GET['search'])) {
                                echo $_GET['search'];
                              } ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </div>
              <table class="table table-primary table-striped">
                <thead>
                  <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col" name="trayek">Trayek</th>
                    <th scope="col" name="plat">Plat Nomer</th>
                    <th scope="col" name="garasi">Garasi</th>
                    <th scope="col" name="masa_pajak">Masa Pajak</th>
                    <th scope="col" name="deskripsi">Deskripsi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($data_angkot as $row): ?>
                    <tr>
                      <th scope="row"><?= $no++ ?></th>
                      <td><?= $row['kode_trayek'] . " " . $row['nama_trayek'] ?></td>
                      <td><?= $row['plat_nomer'] ?></td>
                      <td><?= $row['garasi'] ?></td>
                      <td><?= $row['masa_pajak'] ?></td>
                      <td><?= $row['deskripsi'] ?></td>
                      <td>
                        <div class="d-flex justify-content-between">
                          <a href="edit_angkot.php?id_angkot=<?= $row['id_angkot'] ?>" class="btn btn-primary me-1">
                            <i class="fa-regular fa-pen-to-square"></i>
                          </a>
                          <a href="../function.php?action=delete&id_angkot=<?= $row['id_angkot'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus ini?')">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
              <!-- Pagination -->
              <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php if ($page > 1): ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                  <?php endif; ?>

                  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                      <a class="page-link" href="?page=<?= $i ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"><?= $i ?></a>
                    </li>
                  <?php endfor; ?>

                  <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  <?php endif; ?>
                </ul>
              </nav> -->
              <!-- End Pagination -->
            </div>
          </div>
        </div>
      </div>
      <!-- end angkot -->
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>