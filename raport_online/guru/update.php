<?php
	include '../cek_session.php';
	include '../koneksi.php';
	$id = $_POST['id'];
	$id_siswa = $_POST['id_siswa'];
	$id_guru = $_POST['id_guru'];
	$tugas1 = empty($_POST['tugas1']) ? "NULL" : $_POST['tugas1'];
	$tugas2 = empty($_POST['tugas2']) ? "NULL" : $_POST['tugas2'];
	$kuis = empty($_POST['kuis']) ? "NULL" : $_POST['kuis'];
	$uts = empty($_POST['uts']) ? "NULL" : $_POST['uts'];
	$uas = empty($_POST['uas']) ? "NULL" : $_POST['uas'];
	$semester = $_POST['semester'];

	if (empty($id)) {
		$query = "INSERT INTO `nilai` VALUES(NULL,$id_siswa,$id_guru,"
				."$tugas1,"
				."$tugas2,"
				."$kuis,"
				."$uts,"
				."$uas,"
				."$semester)";
		$pesan = "tambah_sukses";
	}
	else {
		$query = "UPDATE `nilai`\n"
					."SET `id_siswa` = '$id_siswa',\n"
					."`id_guru` = '$id_guru',\n"
					."`tugas1` = $tugas1,\n"
					."`tugas2` = $tugas2,\n"
					."`kuis` = $kuis,\n"
					."`uts` = $uts,\n"
					."`uas` = $uas,\n"
					."`semester` = $semester\n"
					."WHERE `nilai`.`id` = $id";
		$pesan = "edit_sukses";
	}
	$sql = mysqli_query($conn, $query);
	if ($sql) {
		header("Location: home.php?pesan=$pesan");
	}
	else {
		$pesan =  "Data gagal di ubah!\nError: " . mysqli_error($conn);
		die("\nError: " . mysqli_error($conn));
		echo "<script type='text/javascript'>alert('$pesan'); window.location.href='home.php'</script>";
	}
?>