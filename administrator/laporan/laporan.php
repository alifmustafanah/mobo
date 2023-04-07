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



    <form autocomplete="off" action="" method="POST">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Dari Tanggal</label>
                <input type="text" class="dateselects" class="form-control" name="dateFrom" value="<?php echo @$_POST['dateFrom']; ?>">
              </div>

            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label>Sampai Tanggal</label>
                <input type="text" class="dateselects" name="dateTo" value="<?php echo  @$_POST['dateTo']; ?>">
              </div>


              <button type="submit" name="perDate" class="btn btn-flat btn-primary btn-block"><i class="fa fa-search"></i> Cari</button>
            </div>

          </div>
        </div>
    </form>

  <?php
}
  ?>

  <div class="card-body shadow">
    <div class="table-responsive">
      <a target="_blank" class="btn btn-success" href="export_excel.php"><i class="fa fa-book">Export</a></i>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Invoice</th>
            <th>Tanggal</th>
            <th>Oleh</th>

          </tr>

        </thead>
        <tbody>
          <?php
          include "../../koneksi.php";

          @$dateFrom = date("d-m-Y", strtotime($_POST['dateFrom']));
          @$dateTo = date("d-m-Y", strtotime($_POST['dateTo']));

          $no = 1;
          $query = "select tu.id_user,
        tu.id_user,
        tu.username, 
        tu.nis,
        tu.ttl,
        tu.tgl_join,
        tb.id_nilai, 
        tb.tanggal_input,
        tb.agama, 
        tb.ppkn, 
        tb.b_indo,
        tb.mtk,
        tb.ipa, 
        tb.ips, 
        tb.b_ing, 
        tb.prakarya, 
        tb.penjas,
        tb.b_sunda,
        tb.seni_budaya,
        tb.btaq

        from tbl_nilai 
        tb inner join tbl_user 
        tu on 
        tb.id_user = tu.id_user

        and tb.tanggal_input between '" . $dateFrom . "' and '" . $dateTo . "' 
        order by id_nilai DESC";
          $data = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_array($data)) {
          ?>

            <tr>


              <td><?php echo $no++; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['nis']; ?></td>
              <td><?php echo $row['ttl']; ?></td>
              <td><?php echo $row['tgl_join']; ?></td>
              <td><?php echo date("d-m-Y H:i:s", strtotime($row['tanggal_input'])); ?></td>
              <td><?php echo $row['agama']; ?></td>
              <td><?php echo $row['ppkn']; ?></td>
              <td><?php echo $row['b_indo']; ?></td>
              <td><?php echo $row['b_ing']; ?></td>
              <td><?php echo $row['b_sunda']; ?></td>
              <td><?php echo $row['mtk']; ?></td>
              <td><?php echo $row['ipa']; ?></td>
              <td><?php echo $row['ips']; ?></td>
              <td><?php echo $row['seni_budaya']; ?></td>
              <td><?php echo $row['penjas']; ?></td>
              <td><?php echo $row['prakarya']; ?></td>
              <td><?php echo $row['btaq']; ?></td>

            </tr>
          <?php  } ?>

        </tbody>
      </table>
    </div>
  </div>

  </body>

  </html>

  <?php include '../template/js.php'; ?>