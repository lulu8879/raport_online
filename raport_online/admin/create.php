<?php
	include '../cek_session.php';
	include '../koneksi.php';
	if (isset($_GET['mode'])) {
		if ($_GET['mode'] == 'data_siswa') {
			$nis = $_POST['nis'];
			$nama_siswa = $_POST['nama_siswa'];
			$id_kelas = $_POST['id_kelas'];
			$nama_ortu = $_POST['nama_ortu'];

			$query = "INSERT INTO `siswa` VALUES(NULL,'$nis','$nama_siswa',$id_kelas,'$nama_ortu')";
		}
		else if ($_GET['mode'] == 'data_guru') {
			$nip = $_POST['nip'];
			$nama_guru = $_POST['nama_guru'];
			$id_mapel = $_POST['id_mapel'];

			$query = "INSERT INTO `guru` VALUES(NULL,'$nip','$nama_guru',$id_mapel)";
		}
		else if ($_GET['mode'] == 'data_user') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$id_role = $_POST['id_role'];

			$query = "INSERT INTO `user` VALUES(NULL,'$username','$password',$id_role)";
		}
		else if ($_GET['mode'] == 'data_kelas') {
			$kelas = $_POST['kelas'];
			$id_guru = $_POST['id_guru'];

			$query = "INSERT INTO `kelas` VALUES(NULL,'$kelas',$id_guru)";
		}
		else if ($_GET['mode'] == 'data_mapel') {
			$mapel = $_POST['mapel'];

			$query = "INSERT INTO `mapel` VALUES(NULL,'$mapel')";
		}

		$sql = mysqli_query($conn, $query);
		if ($sql) {
			header("Location: home.php?pesan=tambah_sukses");
		}
		else {
			echo "Data gagal di tambahkan!";
			die("\nError: " . mysqli_error($conn));
		}
	}
?>