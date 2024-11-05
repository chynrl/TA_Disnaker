<?php
require '../connection.php';
// require '../function.php';

$id_angkot = $_GET['id_angkot'] ?? null;
$data_angkot = myquery("SELECT * FROM tb_angkot WHERE id_angkot = $id_angkot");
$data_trayek = myquery("SELECT * FROM tb_trayek");

if (!$data_angkot) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['submit_edit_angkot'])) {
    $plat_nomer = ($_POST['txt_plat_nomer']);
    $trayek = ($_POST['select_trayek']);
    $garasi = ($_POST['txt_garasi']);
    $masa_pajak = ($_POST['txt_masa_pajak']);
    $deskripsi = ($_POST['txt_deskripsi']);

    if (isset($_FILES['gambar_angkot']) && $_FILES['gambar_angkot']['error'] == 0) {
        $gambarBaru = $_FILES['gambar_angkot'];
        $namaFileBaru = $gambarBaru['name'];
        $tempFile = $gambarBaru['tmp_name'];
        $targetDir = "../uploaded_images/";
        $targetFile = $targetDir . basename($namaFileBaru);
        $gambarLama = $data_angkot[0]['img_angkot'];

        if (file_exists("../uploaded_images/" . $gambarLama)) {
            unlink("../uploaded_images/" . $gambarLama);
        }
        move_uploaded_file($tempFile, $targetFile);
        $query = "UPDATE tb_angkot SET 
                    plat_nomer = '$plat_nomer', 
                    trayek = '$trayek', 
                    garasi = '$garasi', 
                    masa_pajak = '$masa_pajak', 
                    deskripsi = '$deskripsi', 
                    img_angkot = '$namaFileBaru'
                    WHERE id_angkot = $id_angkot";
    } else {
        $query = "UPDATE tb_angkot SET 
                    plat_nomer = '$plat_nomer', 
                    trayek = '$trayek', 
                    garasi = '$garasi', 
                    masa_pajak = '$masa_pajak', 
                    deskripsi = '$deskripsi'
                    WHERE id_angkot = $id_angkot";
    }

    $res = mysqli_query($conn, $query);

    if ($res > 0) {
        echo "<script>alert('Data Berhasil diubah');
              document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>alert('Data Gagal Diubah');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulir Angkot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
            <div class="card-body p-4">
                <h1>Formulir Data Angkot</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="txt_plat_nomer" class="form-label">Plat Nomer</label>
                        <input type="text" class="form-control" id="txt_plat_nomer" name="txt_plat_nomer"
                            placeholder="Masukan plat nomer angkot" value="<?= $data_angkot[0]['plat_nomer'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label>Trayek Angkot</label>
                        <select class="form-select" aria-label="Default select example" name="select_trayek">
                            <?php foreach ($data_trayek as $option): ?>
                                <option value="<?= $option['id_trayek'] ?>" <?= $option['id_trayek'] == $data_angkot[0]['trayek'] ? 'selected' : '' ?>><?= $option['nama_trayek'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txt_garasi" class="form-label">Garasi</label>
                        <input type="text" class="form-control" id="txt_garasi" name="txt_garasi"
                            placeholder="Masukan lokasi garasi" value="<?= $data_angkot[0]['garasi'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="txt_masa_pajak" class="form-label">Masa Pajak</label>
                        <input type="text" class="form-control" id="txt_masa_pajak" name="txt_masa_pajak"
                            placeholder="Masukan masa pajak" value="<?= $data_angkot[0]['masa_pajak'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="txt_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="txt_deskripsi" name="txt_deskripsi" rows="3" value="<?= $data_angkot[0]['deskripsi'] ?>"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Masukan Gambar Angkot</label>
                        <input type="file" class="form-control" aria-label="file example" name="gambar_angkot" value="<?= $data_angkot[0]['img_angkot']?>">
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit_edit_angkot">Ubah</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>