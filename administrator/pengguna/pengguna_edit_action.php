<?php
include "../koneksi.php";
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$tgl_join = $_POST['tgl_join'];
$level = $_POST['level'];
$status = $_POST['status'];


$query = "UPDATE tbl_user SET
								id_user = '$id_user',
								username = '$username',
								password = '$password',
								level = '$level',
								tgl_join = '$tgl_join',
								status = '$status'
								WHERE id_user = '$id_user'
								";

mysqli_query($koneksi, $query) or die("Gagal Perintah SQL" . mysqli_error($koneksi));
header('location:pengguna.php');
