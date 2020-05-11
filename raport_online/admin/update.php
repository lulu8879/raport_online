<?php
	include '../cek_session.php';
	include '../koneksi.php';
	if (isset($_GET['mode'])) {
		if ($_GET['mode'] == 'data_siswa') {
			$id = $_POST['id'];
			$nis = $_POST['nis'];
			$nama_siswa = $_POST['nama_siswa'];
			$id_kelas = $_POST['id_kelas'];
			$nama_ortu = $_POST['nama_ortu'];

			$query = "UPDATE `siswa`\n"
					."SET `nis` = '$nis',\n"
					."`nama` = '$nama_siswa',\n"
					."`id_kelas` = $id_kelas,\n"
					."`nama_ortu` = '$nama_ortu'\n"
					."WHERE `siswa`.`id` = $id";
		}
		else if ($_GET['mode'] == 'data_guru') {
			$id = $_POST['id'];
			$nip = $_POST['nip'];
			$nama_guru = $_POST['nama_guru'];
			$id_mapel = $_POST['id_mapel'];

			$query = "UPDATE `guru`\n"
					."SET `nip` = '$nip',\n"
					."`nama` = '$nama_guru',\n"
					."`id_mapel` = $id_mapel\n"
					."WHERE `guru`.`id` = $id";
		}
		else if ($_GET['mode'] == 'data_user') {
			$id = $_POST['id'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$id_role = $_POST['id_role'];

			$query = "UPDATE `user`\n"
					."SET `username` = '$username',\n"
					."`password` = '$password',\n"
					."`id_role` = $id_role\n"
					."WHERE `user`.`id` = $id";
		}
		else if ($_GET['mode'] == 'data_kelas') {
			$id = $_POST['id'];
			$kelas = $_POST['kelas'];
			$id_guru = $_POST['id_guru'];

			$query = "UPDATE `kelas`\n"
					."SET `kelas` = '$kelas',\n"
					."`id_guru` = $id_guru\n"
					."WHERE `kelas`.`id` = $id";
		}
		else if ($_GET['mode'] == 'data_mapel') {
			$id = $_POST['id'];
			$mapel = $_POST['mapel'];

			$query = "INSERT INTO `mapel` VALUES(NULL,'$mapel')";
			$query = "UPDATE `guru`\n"
					."SET `mapel` = '$mapel'\n"
					."WHERE `guru`.`id` = $id";
		}

		$sql = mysqli_query($conn, $query);
		if ($sql) {
			header("Location: home.php?pesan=edit_sukses");
		}
		else {
			echo "Data gagal di ubah!";
			die("\nError: " . mysqli_error($conn));
		}
	}
?>