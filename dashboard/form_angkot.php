<?php
  require '../connection.php';

  $data_trayek = myquery("SELECT * FROM tb_trayek");


  if(isset($_POST['submit_form_angkot'])){
    $plat_nomer = $_POST['txt_plat_nomer'];
    $trayek= $_POST['select_trayek'];
    $garasi = $_POST['txt_garasi'];
    $masa_pajak = $_POST['txt_pajak'];
    $deskripsi = $_POST['alamat'];
    $gambar = $_FILES['gambar_angkot']['name'];
    $foto_tmp = $_FILES['gambar_angkot']['tmp_name'];
    move_uploaded_file($foto_tmp, '../uploaded_images/' . $gambar);



    $quey_insert = "INSERT INTO tb_angkot (plat_nomer, trayek, garasi, masa_pajak, deskripsi, img_angkot)
    VALUES ('$plat_nomer', '$trayek', '$garasi', '$masa_pajak', '$deskripsi', '$gambar')";

    $res = mysqli_query($conn, $quey_insert);

    if($res){
      header("Location: index.php");
      exit();
    }else{
      $err = "Data gagal di input";
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
  <style>
    body {
      background-image: url('../gambar/Green-gradient-HD-Backgrounds-Solid-Color.jpg');
      background-position: center;
      background-repeat: no-repeat;
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
  <nav class="navbar navbar-expand-lg custom-bs-navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-md-6 offset-md-3">
          <form class="search-container" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>

        <div class="col-md-3" align="end">
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle bg-light border-0" href="#" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../gambar/R.png" alt="User" class="user rounded-circle me-2">
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Edit Profil</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>

        </div>
        <!-- <button type="button" class="btn btn-secondary">Secondary</button> -->
      </div>
    </div>
    </div>
  </nav>
  <!-- end navbar -->

  <div class="container" style="margin-top: 100px;">
    <div class="card">
      <div class="card-body p-4">
        <h1>Formulir Data Angkot</h1>
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="txt_plat_nomer" class="form-label">Plat Nomer</label>
            <input type="text" class="form-control" id="txt_plat_nomer" name="txt_plat_nomer"
              placeholder="Masukan plat nomer angkot" />
          </div>
          <div class="mb-3">
            <label>Trayek Angkot</label>
            <select class="form-select" aria-label="Default select example" name="select_trayek">
              <?php foreach($data_trayek as $option): ?>
                <option value="<?= $option['id_trayek']?>"><?= $option['nama_trayek'] ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="txt_garasi" class="form-label">Garasi</label>
            <input type="text" class="form-control" id="txt_garasi" name="txt_garasi" placeholder="Masukan Alamat Garasi" />
          </div>
          <div class="mb-3">
            <label for="txt_pajak" class="form-label">Masa Pajak</label>
            <input type="number" class="form-control" id="txt_pajak" name="txt_pajak" placeholder="Masukan tahun pajak yang masih berlaku" />
          </div>
          <div class="mb-3">
            <label for="exampleTextarea" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="exampleTextarea" name="alamat" rows="5" placeholder="Deskripsikan keadaan angkot anda sekarang"></textarea>          </div>
          <div class="mb-3">
            <label for="">Masukan Gambar Angkot</label>
            <input type="file" class="form-control" aria-label="file example" name="gambar_angkot">
            <div class="invalid-feedback">Example invalid form file feedback</div>
          </div>
          <div>
            <button type="submit" class="btn btn-primary" name="submit_form_angkot">Simpan</button>
          </div>
        </form>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>