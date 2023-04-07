<?php
include "../../koneksi.php";


$query = "DELETE FROM tbl_invoice WHERE id_invoice ='$_GET[id]'";

mysqli_query($koneksi, $query) or die("GAGAL UPLOAD" . mysqli_error($koneksi));
header("location:invoice.php");
