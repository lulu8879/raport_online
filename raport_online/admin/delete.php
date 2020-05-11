<?php
	include '../cek_session.php';
	include '../koneksi.php';
	if (isset($_GET['mode'])) {
		$id = $_GET['id'];
		if ($_GET['mode'] == 'data_siswa') {
			$table = '`siswa`';
		}
		else if ($_GET['mode'] == 'data_guru') {
			$table = '`guru`';
		}
		else if ($_GET['mode'] == 'data_user') {
			$table = '`user`';
		}
		else if ($_GET['mode'] == 'data_kelas') {
			$table = '`kelas`';
		}
		else if ($_GET['mode'] == 'data_mapel') {
			$table = '`mapel`';
		}
		$query = "DELETE FROM $table WHERE `id`=$id";

		$sql = mysqli_query($conn, $query);
		if ($sql) {
			header("Location: home.php?pesan=hapus_sukses");
		}
		else {
			echo "Data gagal dihapus!";
			die("\nError: " . mysqli_error($conn));
		}
	}
?>