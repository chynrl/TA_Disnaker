<?php
session_start();
require '../connection.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../authe/login.php");
    exit();
}

$id_driver = $_GET['id_drivers'] ?? null;

if ($id_driver === null) {
    echo "ID Driver tidak tersedia.";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM tb_drivers WHERE id_drivers = ?");
$stmt->bind_param("i", $id_driver);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Driver not found.";
    exit();
}

$driver_data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['txt_nama'];
    $usia = $_POST['txt_usia'];
    $no_wa = $_POST['txt_nomer'];
    $alamat = $_POST['txt_alamat'];

    if (empty($nama) || empty($usia) || empty($no_wa) || empty($alamat)) {
        echo "Isi semua formulir";
        exit();
    }

    $update_stmt = $conn->prepare("UPDATE tb_drivers SET nama = ?, usia = ?, no_wa = ?, alamat = ? WHERE id_drivers = ?");
    $update_stmt->bind_param("ssssi", $nama, $usia, $no_wa, $alamat, $id_driver);
    
    if ($update_stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulir Driver</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <style>
    body {
      background-color: rgb(237, 255, 242);
    }

    .card {
      background-color: rgba(113, 175, 139, 0.5);
    }

    .card-title {
      color: black;
    }

    .search-container {
      display: flex;
      align-content: center;
      align-items: center;
    }

    .user {
      object-fit: contain;
      width: 30px;
      height: 30px;
    }
  </style>
</head>

<body>
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

  <div class="container" style="margin-top: 30px;">
    <div class="card">
      <div class="card-body p-4 ">
        <h1>Formulir Data Driver</h1>
        <form method="POST">
          <input type="hidden" name="id_driver" value="value = <?= $driver_data['id_drivers']?>" />
          <div class="mb-3">
            <label for="txt_nama" class="form-label">Nama</label>
            <input
              type="text"
              class="form-control"
              id="txt_nama"
              name="txt_nama"
              placeholder="Masukan Nama (nama lengkap/nama sebutan)"
              value="<?= $driver_data['nama']; ?>" />
          </div>
          <div class="mb-3">
            <label for="txt_usia" class="form-label">Usia</label>
            <input
              type="number"
              class="form-control"
              id="txt_usia"
              name="txt_usia"
              placeholder="Masukan Usia"
              value = <?= $driver_data['usia']?> />
          </div>
          <div class="mb-3">
            <label for="txt_nomer" class="form-label">Nomer Whatsapp</label>
            <input
              type="text"
              class="form-control"
              id="txt_nomer"
              name="txt_nomer"
              placeholder="contoh : 085678910234"
              value = <?= $driver_data['no_wa']?> />
          </div>
          <div class="mb-3">
            <label for="txt_alamat" class="form-label">Alamat</label>
            <input
              type="text"
              class="form-control"
              id="txt_alamat"
              name="txt_alamat"
              placeholder="Masukan Alamat Rumah"
              value = <?= $driver_data['alamat']?> />
          </div>
          <div>
            <button type="submit" class="btn btn-success" name="submit-form-driver">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>

          </div>
        </form>

      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>