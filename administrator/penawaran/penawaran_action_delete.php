<?php
include "../koneksi.php";


$query = "DELETE FROM tbl_penawaran WHERE id_penawaran ='$_GET[id]'";

mysqli_query($koneksi, $query) or die("GAGAL UPLOAD" . mysqli_error($koneksi));
header("location:penawaran.php");
