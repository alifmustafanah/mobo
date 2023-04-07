<?php
include '../koneksi.php';

$tgl_penawaran          = $_POST['tgl_penawaran'];
$no_penawaran           = $_POST['no_penawaran'];
$prhl_penawaran         = $_POST['prhl_penawaran'];
$cust_penawaran         = $_POST['cust_penawaran'];

$des_penawaran          = $_POST['des_penawaran'];
$hrg_penawaran          = $_POST['hrg_penawaran'];

$total                  = count($des_penawaran) - 1;

$DataJson["transaksi"]      = [];
for ($i = 0; $i < $total; $i++) {

    $H['des_penawaran'] = $des_penawaran[$i];
    $H['hrg_penawaran'] = $hrg_penawaran[$i];
    Array_push($DataJson["transaksi"], $H);
}

//kembali ke halaman sebelumnya
$json_des =  Json_encode($DataJson);
$sts_penawaran  = "AKTIVE";
$query = "INSERT INTO tbl_penawaran SET
                                        id_penawaran    = 'W',
                                        tgl_penawaran   = '$tgl_penawaran',
                                        no_penawaran    = '$no_penawaran',
                                        prhl_penawaran	= '$prhl_penawaran',
                                        cust_penawaran	= '$cust_penawaran',
                                        ket_penawaran	= '$json_des',
                                        sts_penawaran   = '$sts_penawaran'

";

mysqli_query($koneksi, $query)
    or die("Gagal Perintah SQL" . mysqli_error($koneksi));

notif("sukses disimpan");
