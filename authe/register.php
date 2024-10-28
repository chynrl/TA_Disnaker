<?php
require '../connection.php';
$message = '';

if (isset($_POST['submit_register'])) {
  $username = $_POST['txt-username'];
  $email = $_POST['txt-email-daftar'];
  $password = $_POST['txt-password-daftar'];

  $check_username = "SELECT * FROM tb_users WHERE username = '$username'";
  $result_username = mysqli_query($conn, $check_username);

  $check_email = "SELECT * FROM tb_users WHERE email = '$email'";
  $result_email = mysqli_query($conn, $check_email);

  if (mysqli_num_rows($result_username) > 0) {
    $message = "Username sudah digunakan";
  } elseif (mysqli_num_rows($result_email)) {
    $message = "Email sudah digunakan";
  } else {
    $query_insert = "INSERT INTO tb_users(username, email, password)
                        VALUES ('$username', '$email', '$password')";
    $res = mysqli_query($conn, $query_insert);

    if ($res) {
      $message = "Pendaftaran akun berhasil. Silahkan login.";
      echo "<script>
      function redirection(){
        document.location.href = 'login.php';
      }
      setTimeout(redirection, 2000);
      </script>";
    } else {
      $message = "Pendaftaran gagal dilakukan";
    }
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="auth.css">

</head>

<body>
  <div class="container ">
    <div class="card shadow p-4">
      <div class="card-title px-3">
      <?php if ($message): ?>
        <div>
          <p style="color: #ffe6b3; margin-bottom: 8px; display: block;"><?= $message;?></p>
        </div>
      <?php endif; ?>

        <h3>Daftar Akun</h3>
      </div>
      <form method="POST">
        <div class="card-body">
          <div class="mb-3">
            <label for="txt-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="txt-username" name="txt-username" placeholder="Masukan Username">
          </div>
          <div class="mb-3">
            <label for="txt-email-daftar" class="form-label">Email</label>
            <input type="email" class="form-control" id="txt-email-daftar" name="txt-email-daftar" placeholder="Masukan alamat email">
          </div>
          <div class="mb-3">
            <label for="txt-password-daftar" class="form-label">Password</label>
            <input type="password" class="form-control" id="txt-password-daftar" name="txt-password-daftar" rows="3" placeholder="*******"></input>
          </div>
          <div class="d-grid gap-2 col-8 mx-auto">
            <button class="btn btn-success" type="submit" name="submit_register">Daftar</button>
            <p class="text-center">Sudah punya akun <a href="./login.html">masuk di sini!</a></p>
          </div>
        </div>

      </form>
    </div>




  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
</body>

</html>