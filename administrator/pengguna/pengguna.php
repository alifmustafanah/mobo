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

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="pengguna_tambah.php" class="m-0 font-weight-bold text-primary">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama </th>
                <th>Level</th>
                <th>Act</th>


              </tr>
            <tbody>


              <?php
              include "../koneksi.php";
              $no = 1;
              $data = mysqli_query($koneksi, " select 
                id_user,
                username,
                password,
                status,
                level


                from 
                tbl_user 
                order by id_user DESC");
              while ($row = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['username']; ?></td>

                  <td><?php echo $row['level']; ?></td>
                  <td>
                    <!-- <a href="../penawaran/penawaran_view.php" class="btn btn-primary btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-eye"></i>
                      </span>
                      <span class="text">View</span>
                    </a> -->

                    <a href="pengguna_edit.php?id=<?php echo $row['id_user']; ?>" class="btn btn-success btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-pen"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>

                    <a href="pengguna_delete.php?id=<?php echo $row['id_user']; ?>" class="btn btn-danger btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Delete</span>
                    </a>
                  </td>


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
  </body>

  </html>

  <?php include '../template/js.php'; ?>