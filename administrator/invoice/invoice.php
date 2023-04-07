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
        <a href="invoice_tambah.php" class="m-0 font-weight-bold text-primary">Input Invoice</a>
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
              $data = mysqli_query($koneksi, "SELECT * FROM tbl_invoice");
              while ($row = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['id_invoice']; ?></td>
                  <td><?php echo $row['sts_invoice']; ?></td>

                  <td><a href="invoice_view.php?id=<?php $id = $row['id_invoice'];
                                                    echo '%27' . $id . '%27'; ?>" class="btn btn-primary btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-eye"></i>
                      </span>
                      <span class="text">View</span>
                    </a>

                    <a href="invoice_edit.php?id=<?php $id = $row['id_invoice'];
                                                  echo '%27' . $id . '%27'; ?>" class="btn btn-success btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-pen"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>

                    <a href="invoice_action_delete.php?id=<?php echo $row['id_invoice']; ?>" class="btn btn-danger btn-icon-splitid_invoice                    <span class=" icon text-white-50">
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