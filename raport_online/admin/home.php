<?php include '../cek_session.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Start Pesan -->
	<?php
		$pesan = "";
		if (isset($_GET['pesan'])) {
			if ($_GET['pesan'] == "edit_sukses") {
				$pesan = "Data berhasil diupdate!";
			}
			else if ($_GET['pesan'] == "tambah_sukses") {
				$pesan = "Data berhasil ditambahkan!";
			}
			else if ($_GET['pesan'] == "hapus_sukses") {
				$pesan = "Data berhasil dihapus!";
			}
			echo "<script type='text/javascript'>alert('$pesan'); window.location.href='home.php'</script>";
		}
	?>
	<!-- End Pesan -->

	<!-- Start Container -->
	<div class="container-fluid" style="border-radius: 0.25rem; padding: 0; max-width: 100%; overflow: auto; background-image: url('../img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
		<!-- Start Header -->
		<div class="font-italic" style="margin: 10px 15px;">
			<h5>Selamat Datang, <?=$_SESSION['username']?>!</h5>
		</div>
		<!-- End Header -->

		<!-- Start Sidebar -->
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="width: 15%; height: 100%; margin: 0 auto; overflow: auto; float: left;">
			<a class="nav-link" id="v-pills-olah-data-user-tab" data-toggle="pill" href="#v-pills-olah-data-user" role="tab" aria-controls="v-pills-olah-data-user" aria-selected="false">Olah Data User</a>
			<a class="nav-link" id="v-pills-olah-data-mapel-tab" data-toggle="pill" href="#v-pills-olah-data-mapel" role="tab" aria-controls="v-pills-olah-data-mapel" aria-selected="false">Olah Data Mapel</a>
			<a class="nav-link" id="v-pills-olah-data-guru-tab" data-toggle="pill" href="#v-pills-olah-data-guru" role="tab" aria-controls="v-pills-olah-data-guru" aria-selected="false">Olah Data Guru</a>
			<a class="nav-link" id="v-pills-olah-data-kelas-tab" data-toggle="pill" href="#v-pills-olah-data-kelas" role="tab" aria-controls="v-pills-olah-data-kelas" aria-selected="false">Olah Data Kelas</a>
			<a class="nav-link" id="v-pills-olah-data-siswa-tab" data-toggle="pill" href="#v-pills-olah-data-siswa" role="tab" aria-controls="v-pills-olah-data-siswa" aria-selected="true">Olah Data Siswa</a>

			<!-- bc -->
			<!-- <a class="nav-link" id="v-pills-olah-data-siswa-tab" data-toggle="pill" href="#v-pills-olah-data-siswa" role="tab" aria-controls="v-pills-olah-data-siswa" aria-selected="true">Olah Data Siswa</a>
			<a class="nav-link" id="v-pills-olah-data-guru-tab" data-toggle="pill" href="#v-pills-olah-data-guru" role="tab" aria-controls="v-pills-olah-data-guru" aria-selected="false">Olah Data Guru</a>
			<a class="nav-link" id="v-pills-olah-data-user-tab" data-toggle="pill" href="#v-pills-olah-data-user" role="tab" aria-controls="v-pills-olah-data-user" aria-selected="false">Olah Data User</a>
			<a class="nav-link" id="v-pills-olah-data-kelas-tab" data-toggle="pill" href="#v-pills-olah-data-kelas" role="tab" aria-controls="v-pills-olah-data-kelas" aria-selected="false">Olah Data Kelas</a>
			<a class="nav-link" id="v-pills-olah-data-mapel-tab" data-toggle="pill" href="#v-pills-olah-data-mapel" role="tab" aria-controls="v-pills-olah-data-mapel" aria-selected="false">Olah Data Mapel</a> -->
			<!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a> -->
			<!-- <a class="nav-link" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout" role="tab" aria-controls="v-pills-logout" aria-selected="false">Logout</a> -->
			<a class="nav-link" href="" role="button" data-toggle="modal" data-target="#logoutModal">Logout</a>

			<!-- Start Logout Modal -->
			<div class="modal fade text-dark" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body text-left">Anda yakin ingin logout?</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			        <a class="btn btn-primary" href="../logout.php" role="button">Logout</a>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End Logout Modal -->
		</div>
		<!-- End Sidebar -->

		<!-- Start Content -->
		<div class="tab-content" id="v-pills-tabContent" style="width: 83%; height: 86.6vh; margin: 10px auto; overflow: auto; border: 1px solid black; background-color: white;" >
			<!-- Start Olah Data Siswa -->
			<div class="tab-pane fade show active" role="tabpanel">
				<div class="text-center text-dark" style="margin: 40vh auto;">
					<h1>Selamat Datang, <?=$_SESSION['username']?>!</h1>
				</div>
			</div>
			<div class="tab-pane fade" id="v-pills-olah-data-siswa" role="tabpanel" aria-labelledby="v-pills-olah-data-siswa-tab">
				<!-- Start Content Siswa -->
				<div style="margin: 10px;">
					<h6>Olah Data Siswa</h6>
					<a class="btn btn-primary" href="add.php?mode=data_siswa" role="button" style="margin-bottom: 10px;">Tambah</a>
					<!-- Start Table Siswa -->
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<th>Id</th>
							<th>Nomor Induk</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Nama Ortu</th>
							<th colspan="2">Option</th>
						</thead>
						<tbody>
							<?php 
								include '../koneksi.php';
								$query = "SELECT `siswa`.`id`,"
								."`siswa`.`nis`,"
								."`siswa`.`nama`,"
								."`kelas`.`kelas` AS kelas,"
								."`siswa`.`nama_ortu`"
								."FROM `siswa`"
								."JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id`"
								."ORDER BY kelas, `siswa`.`nis`";
								$sql = mysqli_query($conn,$query);
								if (mysqli_num_rows($sql) == 0) {
							?>
								<tr>
									<td colspan="6">Data Kosong</td>
								</tr>
							<?php
								}
								else {
									$i = 1;
									while ($data = mysqli_fetch_assoc($sql)) {
							?>
								<tr>
									<td class="align-middle"><?=$i?></td>
									<td class="align-middle"><?=$data['nis']?></td>
									<td class="align-middle"><?=$data['nama']?></td>
									<td class="align-middle"><?=$data['kelas']?></td>
									<td class="align-middle"><?=$data['nama_ortu']?></td>
									<td class="border-right-0 align-middle">
										<a class="btn btn-primary" href="edit.php?id=<?=$data['id']?>&mode=data_siswa" role="button">Edit</a>
									</td>
									<td class="border-left-0 align-middle">
										<!-- Start Delete Button Trigger Modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteSiswaModal<?=$data['id']?>">Delete</button>
										<!-- End Delete Button Trigger Modal -->

										<!-- Start Delete Modal -->
										<!-- Target Delete based on value id -->
										<div class="modal fade" id="deleteSiswaModal<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteSiswaModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="deleteSiswaModalLabel">Konfirmasi Hapus Data</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body text-left">Anda yakin ingin menghapus data dengan nama = <?=$data['nama']?> ini?</div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										        <a class="btn btn-primary" href="delete.php?id=<?=$data['id']?>&mode=data_siswa" role="button">Delete</a>
										      </div>
										    </div>
										  </div>
										</div>
										<!-- End Delete Modal -->
									</td>
								</tr>
							<?php
										$i++;
									}
								}
							?>
						</tbody>
					</table>
					<!-- End Table Siswa -->
				</div>
				<!-- End Content Siswa -->
			</div>
			<!-- End Olah Data Siswa -->

			<!-- Start Olah Data Guru -->
			<div class="tab-pane fade" id="v-pills-olah-data-guru" role="tabpanel" aria-labelledby="v-pills-olah-data-guru-tab">
				<!-- Start Olah Data Guru -->
				<div style="margin: 10px;">
					<h6>Olah Data Guru</h6>
					<a class="btn btn-primary" href="add.php?mode=data_guru" role="button" style="margin-bottom: 10px;">Tambah</a>
					<!-- Start Table Guru -->
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<th>No</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Mapel yang diampu</th>
							<th colspan="2">Option</th>
						</thead>
						<tbody>
							<?php 
								include '../koneksi.php';
								$query = "SELECT `guru`.`id`,"
										."`guru`.`nip`,"
										."`guru`.`nama`,"
										."`mapel`.`mapel`"
										."FROM `guru`"
										."JOIN `mapel`"
										."ON `guru`.`id_mapel` = `mapel`.`id`";
								$sql = mysqli_query($conn,$query);
								if (mysqli_num_rows($sql) == 0) {
							?>
								<tr>
									<td colspan="5">Data Kosong</td>
								</tr>
							<?php
								}
								else {
									$i = 1;
									while ($data = mysqli_fetch_assoc($sql)) {
							?>
								<tr>
									<td class="align-middle"><?=$i?></td>
									<td class="align-middle"><?=$data['nip']?></td>
									<td class="align-middle"><?=$data['nama']?></td>
									<td class="align-middle"><?=$data['mapel']?></td>
									<td class="border-right-0 align-middle">
										<a class="btn btn-primary" href="edit.php?id=<?=$data['id']?>&mode=data_guru" role="button">Edit</a>
									</td>
									<td class="border-left-0 align-middle">
										<!-- Start Delete Button Trigger Modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteGuruModal<?=$data['id']?>">Delete</button>
										<!-- End Delete Button Trigger Modal -->

										<!-- Start Delete Modal -->
										<!-- Target Delete based on value id -->
										<div class="modal fade" id="deleteGuruModal<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteGuruModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="deleteGuruModalLabel">Konfirmasi Hapus Data</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body text-left">Anda yakin ingin menghapus data dengan nama = <?=$data['nama']?> ini?</div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										        <a class="btn btn-primary" href="delete.php?id=<?=$data['id']?>&mode=data_guru" role="button">Delete</a>
										      </div>
										    </div>
										  </div>
										</div>
										<!-- End Delete Modal -->
									</td>
								</tr>
							<?php
										$i++;
									}
								}
							?>
						</tbody>
					</table>
					<!-- End Table Guru -->
				</div>
				<!-- End Olah Data Guru -->
			</div>
			<!-- End Olah Data Guru -->

			<!-- Start Olah Data User -->
			<div class="tab-pane fade" id="v-pills-olah-data-user" role="tabpanel" aria-labelledby="v-pills-olah-data-user-tab">
				<!-- Start Olah Data User -->
				<div style="margin: 10px;">
					<h6>Olah Data User</h6>
					<a class="btn btn-primary" href="add.php?mode=data_user" role="button" style="margin-bottom: 10px;">Tambah</a>
					<!-- Start Table User -->
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<th>No</th>
							<th>Username</th>
							<th>Status</th>
							<th colspan="2">Option</th>
						</thead>
						<tbody>
							<?php 
								include '../koneksi.php';
								$query = "SELECT `user`.`id`,"
										."`user`.`username`,"
										."`role`.`role` FROM `user`"
										."JOIN `role`"
										."ON `user`.`id_role` = `role`.`id`";
								$sql = mysqli_query($conn,$query);
								if (mysqli_num_rows($sql) == 0) {
							?>
								<tr>
									<td colspan="4">Data Kosong</td>
								</tr>
							<?php
								}
								else {
									$i = 1;
									while ($data = mysqli_fetch_assoc($sql)) {
							?>
								<tr>
									<td class="align-middle"><?=$i?></td>
									<td class="align-middle"><?=$data['username']?></td>
									<td class="align-middle"><?=$data['role']?></td>
									<td class="border-right-0 align-middle">
										<a class="btn btn-primary" href="edit.php?id=<?=$data['id']?>&mode=data_user" role="button">Edit</a>
									</td>
									<td class="border-left-0 align-middle">
										<!-- Start Delete Button Trigger Modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteUserModal<?=$data['id']?>">Delete</button>
										<!-- End Delete Button Trigger Modal -->

										<!-- Start Delete Modal -->
										<!-- Target Delete based on value id -->
										<div class="modal fade" id="deleteUserModal<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="deleteUserModalLabel">Konfirmasi Hapus Data</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body text-left">Anda yakin ingin menghapus data dengan username = <?=$data['username']?> ini?</div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										        <a class="btn btn-primary" href="delete.php?id=<?=$data['id']?>&mode=data_user" role="button">Delete</a>
										      </div>
										    </div>
										  </div>
										</div>
										<!-- End Delete Modal -->
									</td>
								</tr>
							<?php
										$i++;
									}
								}
							?>
						</tbody>
					</table>
					<!-- End Table User -->
				</div>
				<!-- End Olah Data User -->
			</div>
			<!-- End Olah Data User -->

			<!-- Start Olah Data Kelas -->
			<div class="tab-pane fade" id="v-pills-olah-data-kelas" role="tabpanel" aria-labelledby="v-pills-olah-data-kelas-tab">
				<!-- Start Olah Data Kelas -->
				<div style="margin: 10px;">
					<h6>Olah Data Kelas</h6>
					<a class="btn btn-primary" href="add.php?mode=data_kelas" role="button" style="margin-bottom: 10px;">Tambah</a>
					<!-- Start Table Kelas -->
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<th>No</th>
							<th>Kelas</th>
							<th>Wali Kelas</th>
							<th colspan="2">Option</th>
						</thead>
						<tbody>
							<?php 
								include '../koneksi.php';
								$query = "SELECT `kelas`.`id`,"
										."`kelas`.`kelas`,"
										."`guru`.`nip`,"
										."`guru`.`nama`"
										."FROM `kelas`"
										."JOIN `guru`"
										."ON `kelas`.`id_guru` = `guru`.`id`";
								$sql = mysqli_query($conn,$query);
								if (mysqli_num_rows($sql) == 0) {
							?>
								<tr>
									<td colspan="4">Data Kosong</td>
								</tr>
							<?php
								}
								else {
									$i = 1;
									while ($data = mysqli_fetch_assoc($sql)) {
							?>
								<tr>
									<td class="align-middle"><?=$i?></td>
									<td class="align-middle"><?=$data['kelas']?></td>
									<td class="align-middle"><?=$data['nama']?></td>
									<td class="border-right-0 align-middle">
										<a class="btn btn-primary" href="edit.php?id=<?=$data['id']?>&mode=data_kelas" role="button">Edit</a>
									</td>
									<td class="border-left-0 align-middle">
										<!-- Start Delete Button Trigger Modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteKelasModal<?=$data['id']?>">Delete</button>
										<!-- End Delete Button Trigger Modal -->

										<!-- Start Delete Modal -->
										<!-- Target Delete based on value id -->
										<div class="modal fade" id="deleteKelasModal<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteKelasModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="deleteKelasModalLabel">Konfirmasi Hapus Data</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body text-left">Anda yakin ingin menghapus data dengan kelas = <?=$data['kelas']?> ini?</div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										        <a class="btn btn-primary" href="delete.php?id=<?=$data['id']?>&mode=data_kelas" role="button">Delete</a>
										      </div>
										    </div>
										  </div>
										</div>
										<!-- End Delete Modal -->
									</td>
								</tr>
							<?php
										$i++;
									}
								}
							?>
						</tbody>
					</table>
					<!-- End Table Kelas -->
				</div>
				<!-- End Olah Data Kelas -->
			</div>
			<!-- End Olah Data Kelas -->

			<!-- Start Olah Data Mapel -->
			<div class="tab-pane fade" id="v-pills-olah-data-mapel" role="tabpanel" aria-labelledby="v-pills-olah-data-mapel-tab">
				<!-- Start Olah Data Mapel -->
				<div style="margin: 10px;">
					<h6>Olah Data Mapel</h6>
					<a class="btn btn-primary" href="add.php?mode=data_mapel" role="button" style="margin-bottom: 10px;">Tambah</a>
					<!-- Start Table Mapel -->
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<th>No</th>
							<th>Mapel</th>
							<th colspan="2">Option</th>
						</thead>
						<tbody>
							<?php 
								include '../koneksi.php';
								$query = "SELECT * FROM `mapel`";
								$sql = mysqli_query($conn,$query);
								if (mysqli_num_rows($sql) == 0) {
							?>
								<tr>
									<td colspan="3">Data Kosong</td>
								</tr>
							<?php
								}
								else {
									$i = 1;
									while ($data = mysqli_fetch_assoc($sql)) {
							?>
								<tr>
									<td class="align-middle"><?=$i?></td>
									<td class="align-middle"><?=$data['mapel']?></td>
									<td class="border-right-0 align-middle">
										<a class="btn btn-primary" href="edit.php?id=<?=$data['id']?>&mode=data_mapel" role="button">Edit</a>
									</td>
									<td class="border-left-0 align-middle">
										<!-- Start Delete Button Trigger Modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteMapelModal<?=$data['id']?>">Delete</button>
										<!-- End Delete Button Trigger Modal -->

										<!-- Start Delete Modal -->
										<!-- Target Delete based on value id -->
										<div class="modal fade" id="deleteMapelModal<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteMapelModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="deleteMapelModalLabel">Konfirmasi Hapus Data</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body text-left">Anda yakin ingin menghapus data dengan mapel = <?=$data['mapel']?> ini?</div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										        <a class="btn btn-primary" href="delete.php?id=<?=$data['id']?>&mode=data_mapel" role="button">Delete</a>
										      </div>
										    </div>
										  </div>
										</div>
										<!-- End Delete Modal -->
									</td>
								</tr>
							<?php
										$i++;
									}
								}
							?>
						</tbody>
					</table>
					<!-- End Table Mapel -->
				</div>
				<!-- End Olah Data Mapel -->
			</div>
			<!-- End Olah Data Mapel -->

			<!-- Start Profile -->
			<!-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
				This is Profile
			</div> -->
			<!-- End Profile -->

			<!-- Start Logout -->
			<!-- <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
				Logout
			</div> -->
			<!-- End Logout -->
		</div>
		<!-- End Content -->
		
		<!-- Start Footer -->
		<div class="card bg-dark" style="clear: both;">
			<div class="card-header text-light" style="padding: 1.2vh;">
				Copyright&copy; Sakti
			</div>
		</div>
		<!-- End Footer -->
	</div>
	<!-- End Container -->
</body>
</html>