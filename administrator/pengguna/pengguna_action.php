
<?php
include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$tgl_join = $_POST['tgl_join'];
$level = $_POST['level'];
$status = $_POST['status'];
$query = "insert INTO tbl_user SET
								
								username = '$username',
								password = '$password',
								tgl_join = '$tgl_join',
								status = '$status',
								level = '$level'
								";

mysqli_query($koneksi, $query)
	or die("Gagal Perintah SQL" . mysqli_error($koneksi));
header('location:pengguna.php');

?>



