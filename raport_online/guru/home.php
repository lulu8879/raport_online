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
	<!-- Start Set Mode -->
	<?php
		$mode = '';
		if (isset($_GET['submit'])) {
			if ($_GET['submit'] == 'Tampilkan') {
				$mode = 'olah_nilai_siswa';
			}
		}else if (isset($_GET['pesan'])) {
			if ($_GET['pesan'] == "edit_sukses") {
				$pesan = "Data berhasil diupdate!";
			}
			else if ($_GET['pesan'] == "tambah_sukses") {
				$pesan = "Data berhasil ditambahkan!";
			}
			echo "<script type='text/javascript'>alert('$pesan'); window.location.href='home.php'</script>";
		}
	?>
	<!-- End Set Mode -->

	<!-- Start Container -->
	<div class="container-fluid" style="border-radius: 0.25rem; padding: 0; max-width: 100%; overflow: auto; background-image: url('../img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
		<!-- Start Header -->
		<div class="font-italic" style="margin: 10px 15px;">
			<h5>Selamat Datang, Guru dengan NIP <?=$_SESSION['username']?>!</h5>
		</div>
		<!-- End Header -->

		<!-- Start Sidebar -->
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="width: 15%; height: 100%; margin: 0 auto; overflow: auto; float: left;">
			<a class="nav-link" id="v-pills-olah-nilai-siswa-tab" data-toggle="pill" href="#v-pills-olah-nilai-siswa" role="tab" aria-controls="v-pills-olah-nilai-siswa" aria-selected="true">Olah Nilai Siswa</a>
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
		<div class="tab-content" id="v-pills-tabContent" style="max-width: 83%; height: 86.6vh; margin: 10px auto; overflow: auto; border: 1px solid black; background-color: white;" >
			<!-- Start Olah Nilai Siswa -->
			<div class="tab-pane fade <?=$mode == '' ? "show active" : ""?>" role="tabpanel">
				<div class="text-center text-dark" style="margin: 40vh auto;">
					<h1>Selamat Datang, Guru dengan NIP <?=$_SESSION['username']?>!</h1>
				</div>
			</div>
			<div class="tab-pane fade <?=$mode == 'olah_nilai_siswa' ? "show active" : ""?>" id="v-pills-olah-nilai-siswa" role="tabpanel" aria-labelledby="v-pills-olah-nilai-siswa-tab">
				<!-- Start Content Nilai Siswa -->
				<div style="margin: 10px;">
					<!-- Set Mapel dan Id Guru-->
					<?php
						include '../koneksi.php';
						$nip = $_SESSION['username'];
						$query = "SELECT `mapel`.`mapel`, `guru`.`id` AS id_guru FROM `guru`\n"
								."JOIN `mapel` ON `guru`.`id_mapel` = `mapel`.`id`\n"
								."WHERE `guru`.`nip` = '$nip'";
						$sql = mysqli_query($conn,$query);
						$data = mysqli_fetch_assoc($sql);
						$mapel = $data['mapel'];
						$id_guru = $data['id_guru'];
					?>
					<h6>Olah Nilai Mapel <?=$mapel?></h6>
					<form action="home.php?mode=olah_nilai_siswa" method="GET" style="width: 80vw;">
						<!-- Form Inline for Select Option -->
						<div class="form-inline">
							<div class="form-group mb-2">
								<select class="form-control" name="semester">
									<option <?=isset($_GET['semester']) ? ($_GET['semester'] == '' ? 'selected' : '') : 'selected'?> value="">-- Pilih Semester --</option>
									<option <?=isset($_GET['semester']) ? ($_GET['semester'] == '1' ? 'selected' : '') : ''?> value="1">1</option>
									<option <?=isset($_GET['semester']) ? ($_GET['semester'] == '2' ? 'selected' : '') : ''?> value="2">2</option>
									<option <?=isset($_GET['semester']) ? ($_GET['semester'] == '3' ? 'selected' : '') : ''?> value="3">3</option>
									<option <?=isset($_GET['semester']) ? ($_GET['semester'] == '4' ? 'selected' : '') : ''?> value="4">4</option>
									<option <?=isset($_GET['semester']) ? ($_GET['semester'] == '5' ? 'selected' : '') : ''?> value="5">5</option>
									<option <?=isset($_GET['semester']) ? ($_GET['semester'] == '6' ? 'selected' : '') : ''?> value="6">6</option>
								</select>
							</div>
							<div class="form-group mx-3 mb-2">
								<select class="form-control" name="id_kelas">
									<option <?=isset($_GET['id_kelas']) ? ($_GET['id_kelas'] == '' ? 'selected' : '') : 'selected'?> value="">-- Pilih Kelas --</option>
									<?php
			  							include '../koneksi.php';
										$query = "SELECT `id`,`kelas` FROM `kelas`";
										$sql = mysqli_query($conn,$query);
										while ($data=mysqli_fetch_assoc($sql)){
									?>
										<option <?=isset($_GET['id_kelas']) ? ($_GET['id_kelas'] == $data['id'] ? 'selected' : '') : ''?> value="<?=$data['id']?>"><?=$data['kelas']?></option>
								<?php } ?>
								</select>
							</div>
						</div>

						<!-- Form Row for Button -->
						<div class="form-group row">
							<div class="col-sm-3">
								<input type="submit" class="btn btn-primary" name="submit" value="Tampilkan" style="margin-bottom: 10px;">
								<!-- <a class="btn btn-primary" href="add.php" role="button" style="margin-bottom: 10px;">Tambah</a> -->
							</div>
						</div>
					</form>

					<!-- Start Table Nilai Siswa -->
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<!-- Baris Atas -->
							<tr>
								<th class="align-middle" rowspan="2">No</th>
								<th class="align-middle" rowspan="2">NIS</th>
								<th class="align-middle" rowspan="2">Nama</th>
								<th class="align-middle" colspan="5">Nilai</th>
								<th class="align-middle" rowspan="2">Option</th>
							</tr>
							<!-- Baris Bawah Opsi Nilai -->
							<tr>
								<th>Tugas 1</th>
								<th>Tugas 2</th>
								<th>Kuis</th>
								<th>UTS</th>
								<th>UAS</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include '../koneksi.php';
								if (isset($_GET['submit'])) {
									if ($_GET['submit'] == 'Tampilkan') {
										$mode = 'olah_nilai_siswa';
										if (empty($_GET['id_kelas']) OR empty($_GET['semester'])){
							?>
											<tr>
												<td colspan="9">Silakan pilih kelas dan semester!</td>
											</tr>
							<?php
										}
										else {
											$semester = $_GET['semester'];
											$id_kelas = $_GET['id_kelas'];

											## Get All Siswa Per Kelas
											$query = "SELECT `id` AS id_siswa,`nis`,`nama` FROM `siswa` WHERE `id_kelas` = $id_kelas";
											$sql = mysqli_query($conn,$query);
											$data2 = array();
											while ($row = mysqli_fetch_assoc($sql)) {
												$data2[$row['id_siswa']] = $row;
											}

											## Get All Nilai
											$query2 = "SELECT `id`,`id_siswa`,`semester`,`tugas1`,`tugas2`,`kuis`,`uts`,`uas` FROM `nilai` WHERE `id_guru` = $id_guru";
											$sql2 = mysqli_query($conn,$query2);
											while ($row = mysqli_fetch_assoc($sql2)) {
												## Merge Siswa dengan Nilai sesuai id_siswa dan semester
												foreach ($data2 as $value) {
													if ($value['id_siswa'] == $row['id_siswa']) {
														$data2[$row['id_siswa']]['semester'][$row['semester']]['tugas1'] = $row['tugas1'];
														$data2[$row['id_siswa']]['semester'][$row['semester']]['tugas2'] = $row['tugas2'];
														$data2[$row['id_siswa']]['semester'][$row['semester']]['kuis'] = $row['kuis'];
														$data2[$row['id_siswa']]['semester'][$row['semester']]['uts'] = $row['uts'];
														$data2[$row['id_siswa']]['semester'][$row['semester']]['uas'] = $row['uas'];
														$data2[$row['id_siswa']]['semester'][$row['semester']]['semester'] = $row['semester'];
														$data2[$row['id_siswa']]['semester'][$row['semester']]['id_nilai'] = $row['id'];
													}
												}	
											}

											if (mysqli_num_rows($sql) == 0) {
							?>
												<tr>
													<td colspan="9">Data Kosong</td>
												</tr>
							<?php
											}
											else {
												$i = 1;
												foreach ($data2 as $data) {
							?>
													<tr>
														<td><?=$i?></td>
														<td><?=$data['nis']?></td>
														<td><?=$data['nama']?></td>
														<td><?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['tugas1'] : ""?></td>
														<td><?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['tugas2'] : ""?></td>
														<td><?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['kuis'] : ""?></td>
														<td><?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['uts'] : ""?></td>
														<td><?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['uas'] : ""?></td>
														<td>
															<form action="edit.php?id=<?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['id_nilai'] : ""?>" method="POST">
																<input type="hidden" name="id_kelas" value="<?=$id_kelas?>">
																<input type="hidden" name="semester" value="<?=$semester?>">
																<input type="hidden" name="nis" value="<?=$data['nis']?>">
																<input type="hidden" name="nama" value="<?=$data['nama']?>">
																<input type="hidden" name="tugas1" value="<?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['tugas1'] : ""?>">
																<input type="hidden" name="tugas2" value="<?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['tugas2'] : ""?>">
																<input type="hidden" name="kuis" value="<?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['kuis'] : ""?>">
																<input type="hidden" name="uts" value="<?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['uts'] : ""?>">
																<input type="hidden" name="uas" value="<?=isset($data['semester'][$semester]) ? $data['semester'][$semester]['uas'] : ""?>">
																<input type="submit" class="btn btn-primary" name="submit" value="Edit">
															</form>
															<!-- <a class="btn btn-primary" href="edit.php?id=<?=$data['id']?>" role="button">Edit</a> -->
															<!-- <a class="btn btn-primary" href="delete.php?id=<?=$data['id']?>" role="button">Delete</a> -->
														</td>
													</tr>
							<?php
													$i++;
												}
											}
										}
									}
								}
								else {
							?>
									<tr>
										<td colspan="9">Silakan pilih kelas dan semester!</td>
									</tr>
							<?php
								}
							?>							
						</tbody>
					</table>
					<!-- End Table Nilai Siswa -->
				</div>
				<!-- End Content Nilai Siswa -->
			</div>
			<!-- End Olah Nilai Nilai Siswa -->

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