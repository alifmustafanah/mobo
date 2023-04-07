<?php
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/mobo.png">
  <script src="assets/font.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/style.css" />
  <title>login</title>
</head>

<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="autentifikasi.php" class="sign-in-form" method="post">
          <?php
          if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'belum_terdaftar') {
              echo 'Gagal : Username Belum Terdaftar';
            } else if ($_GET['pesan'] == 'nik_nonaktif') {
              echo 'Gagal : Username Tidak Aktif';
            } else if ($_GET['pesan'] == 'password_salah') {
              echo 'Gagal : Password Salah';
            } else {
              echo 'Username dan Password harus terisi';
            }
          }

          ?>
          <img src="assets/img/avatar.svg" style="width: 100px;">
          <h2 class="title">Login</h2>
          <div class="input-field">
            <i class="fas fa-address-card"></i>
            <input type="text" placeholder="Username" name="username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <label for="setcookie"><input type="checkbox" name="setcookie" value="true" id="setcookie" /> Remember Me</label>
          <input type="submit" value="Login" class="btn solid" />
        </form>

        <form action="#" class="sign-up-form">
          <h2 class="title">Buat</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-address-card"></i>
            <input type="NIK" placeholder="NIK" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" />
          </div>
          <input type="submit" class="btn" value="Sign up" />

          <div class="social-media">

          </div>
        </form>
        <hr>
        <center>
          <a href="https://moboid.id/" />moboid.id</a>
        </center>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">

          <p>
          </p>

        </div>
        <img src="assets/img/mobosolid.png" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">

        </div>
        <img src="assets/img/moboid.png" class="image" alt="" />
      </div>
    </div>
  </div>
  <script src="assets/app.js"></script>
</body>

</html>