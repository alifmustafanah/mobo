

<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * from tbl_user where username='$username'");

$check = mysqli_num_rows($login);

if ($check > 0) {
	$data = mysqli_fetch_array($login);
	if ($data['status'] == 'ACTIVE') {
		if ($data['password'] == $password = md5($_POST['password'])) {
			if ($data['level'] == "superadmin") {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['level'] = "superadmin";
				$_SESSION['id_user'] = $data['id_user'];
				header("location:location:hell.php");
			} else if ($data['level'] == "administrator") {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['level'] = "administrator";
				$_SESSION['id_user'] = $data['id_user'];
				$_SESSION['username'] = $data['username'];
				header("location:dashboard/dashboard.php");
			} else if ($data['level'] == "admin") {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['level'] = "admin";
				$_SESSION['id_user'] = $data['id_user'];
				$_SESSION['username'] = $data['username'];
				header("location:dashboard/dashboard.php");
			} else if ($data['level'] == "user") {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['level'] = "user";
				$_SESSION['id_user'] = $data['id_user'];
				$_SESSION['username'] = $data['username'];
				header("location:../index.php");
			} else {
				echo 'string';
			}
		} else {
			header('location:index.php?pesan=password_salah');
		}
	} else {
		header('location:index.php?pesan=username_nonaktif');
	}
} else {
	header('location:index.php?pesan=belum_terdaftar');
}

?>
