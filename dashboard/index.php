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
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
      .btn{
        margin: 5px;
        max-width: fit-content;
        justify-content: center;
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
            <!-- <button type="button" class="btn btn-secondary">Secondary</button> -->
          </div>
        </div>
      </div>
    </nav>
    <!-- end navbar -->



    <div class="container py-4">
      <div class="row align-items-center">
        <!-- Profil -->
        <div class="col-3">
          <div class="card text-center" style="padding: 0px">
            <div class="card-body">
                  <h4 class="card-title">Profil</h4>
                  <div class="row" align="center">
                    <div class="d-flex justify-content-center align-items-center">
                      <img src="./driver-silhouette.jpg" class="card-img-top rounded-circle" alt="..." style="width: 200px; height: 200px;">
                    </div>
                              <div class="card-body">
                              <h5 class="card-title">Isi nama</h5>
                              <a href="#" class="btn btn-secondary">Edit profil</a>
                              
                          
                          <div class="content-profil text-start">
                              <table>
                                  <tbody>
                                      <tr>
                                          <td><strong>Nama</strong></td>
                                      </tr>
                                      <tr>
                                          <td>Isi nama </td>
                                      </tr>
                                      <tr>
                                          <td><strong>Alamat</strong></td>
                                      </tr>
                                      <tr>
                                          <td>jalan nin aja dulu </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      
                  </div>
            </div>
          </div>
        </div>
        </div>
        <!-- end profil -->

        <!-- Angkot -->
        <div class="col-9">
          <div class="card text-center" style="padding : 0px;">
            <div class="card-body">
              <h5 class="card-title">Daftar Angkot</h5>
              <table class="table table-primary table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Trayek</th>
                    <th scope="col">Plat Nomer</th>
                    <th scope="col">Garasi</th>
                    <th scope="col">Masa Pajak</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Cicaheum-Ledeng</td>
                    <td>D 1234 ABC</td>
                    <td>jalan permai</td>
                    <td>2024</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                    <td>
                      <div style="display: flex; flex-direction:column;">
                      <button type="button" class="btn btn-success"><i class="fa-solid fa-circle-info"></i></button>
                      <button type="button" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end angkot -->
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
