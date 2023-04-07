<?php

session_start();

if (empty($_SESSION['username']) || $_SESSION['level'] != 'admin') {

  header('location:login.php');
} else {
?>

  <!DOCTYPE html>
  <html>

  <head>

    <?php include '../template/css.php'; ?>
  </head>

  <body>

    <?php
    include "../koneksi.php";
    $query = 'select COUNT(*)
    FROM tbl_user  ';
    $data = mysqli_query($koneksi, $query);
    ?>
    <?php while ($row = mysqli_fetch_array($data)) {   ?>

      <?php
      $close = 'select COUNT(*) 
      FROM tbl_user';
      $data1 = mysqli_query($koneksi, $close);
      ?>
      <?php while ($row1 = mysqli_fetch_array($data1)) {   ?>





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Penawaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row[0]; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Invoice </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row1[0]; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          <?php
        }
          ?>


        <?php
      }
        ?>
      <?php
    }
      ?>


  </body>


  </html>


  <?php include '../template/js.php'; ?>