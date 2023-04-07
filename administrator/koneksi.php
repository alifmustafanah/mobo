<?php
$koneksi = mysqli_connect(
	"localhost",
	"root",
	"",
	"db_moboid_id"
);
if (mysqli_connect_errno()) {
	echo "koneksi gagal"
		. mysqli_connect_error();
}

function notif($pesan)
{
	echo "<script>alert('$pesan');history.go(-1);</script>";
}
