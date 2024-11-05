<?php
require '../connection.php';
session_start();

$data_trayek = myquery("SELECT * FROM tb_trayek");

$id_driver = $_GET['id_drivers'] ?? null;
$angkot_drivers = "SELECT * FROM tb_angkot WHERE id_drivers = $id_driver";
$drivers_result = mysqli_query($conn, $angkot_drivers);

if ($drivers_result) {
    $data = mysqli_fetch_assoc($drivers_result);
    if ($data) {
        $id_angkot = $data['id_angkot'];
        $plat_nomer = $data['plat_nomer'];
        $trayek = $data['trayek'];
        $garasi = $data['garasi'];
        $masa_pajak = $data['masa_pajak'];
        $deskripsi = $data['deskripsi'];
        $gambar_angkot = $data['img_angkot'];
    } else {
        $id_angkot = null; 
    }
} else {
    echo "Error fetching angkot data: " . mysqli_error($conn);
    exit();
}

if (isset($_POST['submit_form_angkot'])) {
    $plat_nomer = $_POST['txt_plat_nomer'];
    $trayek = $_POST['select_trayek'];
    $garasi = $_POST['txt_garasi'];
    $masa_pajak = $_POST['txt_pajak'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar_angkot']['name'];
    $foto_tmp = $_FILES['gambar_angkot']['tmp_name'];
    move_uploaded_file($foto_tmp, '../uploaded_images/' . $gambar);

        $query_insert = "INSERT INTO tb_angkot (plat_nomer, trayek, garasi, masa_pajak, deskripsi, img_angkot, id_drivers) VALUES (
            '$plat_nomer',
            '$trayek',
            '$garasi',
            '$masa_pajak',
            '$deskripsi',
            '$gambar',
            $id_driver
        )";

    $res = mysqli_query($conn, $query_insert);
    $check = mysqli_affected_rows($conn);

    if ($check > 0) {
        echo "<script>alert('Data Berhasil ditambah');
                  document.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulir Angkot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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

    <div class="container" style="margin-top: 30px;" >
        <div class="card">
            <div class="card-body p-4">
                <h1>Formulir Data Angkot</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="txt_plat_nomer" class="form-label">Plat Nomer</label>
                        <input type="text" class="form-control" id="txt_plat_nomer" name="txt_plat_nomer" placeholder="Masukan plat nomer angkot"  required />
                    </div>
                    <div class="mb-3">
                        <label>Trayek Angkot</label>
                        <select class="form-select" aria-label="Default select example" name="select_trayek" required>
                            <?php foreach ($data_trayek as $option): ?>
                                <option value="<?= $option['id_trayek']?>"><?= $option['nama_trayek'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txt_garasi" class="form-label">Garasi</label>
                        <input type="text" class="form-control" id="txt_garasi" name="txt_garasi" placeholder="Masukan Alamat Garasi"  required />
                    </div>
                    <div class="mb-3">
                        <label for="txt_pajak" class="form-label">Masa Pajak</label>
                        <input type="number" class="form-control" id="txt_pajak" name="txt_pajak" placeholder="Masukan tahun pajak yang masih berlaku" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleTextarea" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleTextarea" name="deskripsi" rows="5" placeholder="Deskripsikan keadaan angkot anda sekarang" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Masukan Gambar Angkot</label>
                        <input type="file" class="form-control" aria-label="file example" name="gambar_angkot" required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="submit_form_angkot">Simpan</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>
