<?php
    $GET['action'] = 'edit';
    require 'function.php';

    $id = $GET['id_drivers'];
    $data_drivers = myquery("SELECT * FROM tb_drivers WHERE id_drivers = $id");
    $data_alamat = myquery("SELECT * FROM tb_trayek");

    if(isset($_POST['']))

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
      crossorigin="anonymous"
    />
    <style>
            body{    
        background-image: url('../gambar/Green-gradient-HD-Backgrounds-Solid-Color.jpg');
        background-position: center;
        background-repeat: no-repeat;
      }
      .card{
        background-color: rgba(113, 175, 139, 0.5);
      }
      .card-title {
        color: black;
      }
      .search-container{
        display: flex;
        align-content: center;
        align-items: center;
      }
      .user{
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="btn btn-secondary dropdown-toggle bg-light border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../gambar/R.png" alt="User" class="user rounded-circle me-2">
              </a>
            
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Edit Profil</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </div>

            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end navbar -->



          <div class="container" style="margin-top: 100px;">
            <div class="card">
              <div class="card-body p-4 ">
                <h1>Formulir Data Driver</h1>
                  <form method="POST">
                    <input type="hidden" value="<?= $id_drivers?>" name = "id_drivers">
                    <div class="mb-3">
                      <label for="txt_nama" class="form-label">Nama</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txt_nama"
                        name="txt_nama"
                        placeholder="Masukan Nama (nama lengkap/nama sebutan)"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="txt_usia" class="form-label">Usia</label>
                      <input
                        type="number"
                        class="form-control"
                        id="txt_usia"
                        name="txt_usia"
                        placeholder="Masukan Usia"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="txt_nomer" class="form-label">Nomer Whatsapp</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txt_nomer"
                        name="txt_nomer"
                        placeholder="contoh : 085678910234"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="txt_alamat" class="form-label">Alamat</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txt_alamat"
                        name="txt_alamat"
                        placeholder="Masukan Alamat Rumah"
                      />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="submit-form-driver">Simpan</button>
                    </div>
                  </form>

              </div>
            </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
