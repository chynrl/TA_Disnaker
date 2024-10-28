<?php
  require '../connection.php';

  if(isset($_POST['submit_login'])){
      $email = $_POST['txt-email-masuk'];
      $password = $_POST['txt-password-masuk'];

      $query_login = "SELECT * FROM tb_users WHERE email = '$email' AND password = '$password'";

      $res = mysqli_query($conn, $query_login);

      if(mysqli_num_rows($res) > 0){
        header("Location: ../dashboard/index.html");
        exit();
      }else{
        $err = "Data Tidak Sesuai";
      }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="auth.css">
    <style>
        
        .card{
            width:500px;
        }
    </style>

    </head>
  <body>
    <div class="container">
                <div class="card shadow p-4">
                    <div class="card-title px-3">
                        <h3>Masuk Akun</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="txt-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="txt-email-masuk" name="txt-email-masuk" placeholder="Masukan email Anda">
                              </div>
                              <div class="mb-3">
                                <label for="txt-password" class="form-label">Kata Sandi</label>
                                <input type= "password" class="form-control" id="txt-password-masuk" name="txt-password-masuk" rows="3" placeholder="Masukan Password"></input>
                              </div>
                              <div class="d-grid gap-2 col-8 mx-auto">
                                <button class="btn btn-success" type="submit" name="submit_login">Masuk</button>
                                <hr>
                                <p class="text-center">Belum punya akun? <a href="./register.php">Daftar di sini</a></p>
                              </div>
                        </div>

                    </form>
                </div>
            



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>