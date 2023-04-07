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
        <a href="penawaran_tambah.php" class="m-0 font-weight-bold text-primary">Input Penawaran</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Status</th>
                <th>Print</th>
              </tr>
            <tbody>


              <?php
              include "../koneksi.php";
              $no = 1;
              $data = mysqli_query($koneksi, "SELECT * FROM tbl_penawaran");
              while ($row = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['no_penawaran']; ?></td>
                  <td><?php echo $row['sts_penawaran']; ?></td>


                  <td><a href="penawaran_view.php?id_penawaran=<?php echo $row['id_penawaran']; ?>" class="btn btn-primary btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-eye"></i>
                      </span>
                      <span class="text">View</span>
                    </a>

                    <a href="penawaran_edit.php?id_penawaran=<?php echo $row['id_penawaran']; ?>" class="btn btn-success btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-pen"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>

                    <a href="penawaran_action_delete.php?id=<?php echo $row['id_penawaran']; ?>" class="btn btn-danger btn-icon-split">
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