<?php
	include 'koneksi.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
	$sql = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($sql);
	if (mysqli_num_rows($sql) == 1){
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'login';
		if ($data['id_role'] == 1) {
			$path = 'admin';
		}
		else if ($data['id_role'] == 2) {
			$path = 'guru';
		}
		else if ($data['id_role'] == 3) {
			$path = 'ortu';
		}
		header("Location: $path/home.php");
	}
	else {
		session_destroy();
		header("Location: index.php?pesan=gagal");
	}
?>