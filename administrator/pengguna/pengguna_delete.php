<?php
include "../koneksi.php";


$query = "DELETE FROM tbl_user
							WHERE id_user ='$_GET[id]'
								";

mysqli_query($koneksi, $query)
	or die("Gagal Perintah SQL" . mysqli_error($koneksi));
header('location:pengguna.php');
