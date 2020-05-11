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
				$mode = 'lihat_nilai_siswa';
			}
		}
	?>
	<!-- End Set Mode -->

	<!-- Start Container -->
	<div class="container-fluid" style="border-radius: 0.25rem; padding: 0; max-width: 100%; overflow: auto; background-image: url('../img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
		<!-- Start Header -->
		<div class="font-italic" style="margin: 10px 15px;">
			<h5>Selamat Datang, Ortu Siswa dengan NIS <?=$_SESSION['username']?>!</h5>
		</div>
		<!-- End Header -->

		<!-- Start Sidebar -->
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="width: 15%; height: 100%; margin: 0 auto; overflow: auto; float: left;">
			<a class="nav-link" id="v-pills-lihat-nilai-siswa-tab" data-toggle="pill" href="#v-pills-lihat-nilai-siswa" role="tab" aria-controls="v-pills-lihat-nilai-siswa" aria-selected="true">Lihat Nilai Siswa</a>
			<!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a> -->
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
			<!-- Start Lihat Nilai Siswa -->
			<div class="tab-pane fade <?=$mode == '' ? "show active" : ""?>" role="tabpanel">
				<div class="text-center text-dark" style="margin: 40vh auto;">
					<h5>Selamat Datang, Ortu Siswa dengan NIS <?=$_SESSION['username']?>!</h5>
				</div>
			</div>
			<div class="tab-pane fade <?=$mode == 'lihat_nilai_siswa' ? "show active" : ""?>" id="v-pills-lihat-nilai-siswa" role="tabpanel" aria-labelledby="v-pills-lihat-nilai-siswa-tab">
				<!-- Start Content Nilai Siswa -->
				<div style="margin: 10px;">
					<!-- Set Var utk Siswa -->
					<?php
						include '../koneksi.php';
						$nis = $_SESSION['username'];
						$query = "SELECT * FROM `siswa`"
								."WHERE `nis` = '$nis'";
						$sql = mysqli_query($conn,$query);
						$data = mysqli_fetch_assoc($sql);
						$nama = $data['nama'];
						$id_siswa = $data['id'];
						$nama_ortu = $data['nama_ortu'];
					?>
					<h6>Lihat Nilai <?=$nis?> - <?=$nama?></h6>
					<form action="home.php?mode=lihat_nilai_siswa" method="GET" style="width: 80vw;">
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
						</div>

						<!-- Form Row for Button -->
						<div class="form-group row">
							<div class="col-sm-2">
								<input type="submit" class="btn btn-primary" name="submit" value="Tampilkan" style="margin-bottom: 10px;">
							</div>
						</div>
					</form>

					<!-- Start Table Nilai Siswa -->
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<!-- Baris Atas -->
							<tr>
								<th class="align-middle" rowspan="2">No</th>
								<th class="align-middle" rowspan="2">Mapel</th>
								<th class="align-middle" colspan="5">Nilai</th>
								<th class="align-middle" rowspan="2">Rata - rata</th>
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
								$semester = isset($_GET['semester']) ? $_GET['semester'] : "";
								if (isset($_GET['submit'])) {
									if ($_GET['submit'] == 'Tampilkan') {
										$mode = 'lihat_nilai_siswa';
										if (empty($semester)) {
							?>
											<tr>
												<td colspan="8">Silakan pilih semester!</td>
											</tr>
							<?php
										}
										else {
											$query = "SELECT `nilai`.`id_guru`,"
													."`nilai`.`tugas1`,"
													."`nilai`.`tugas2`,"
													."`nilai`.`kuis`,"
													."`nilai`.`uts`,"
													."`nilai`.`uas`,"
													."`guru`.`id_mapel`,"
													."`mapel`.`mapel`"
													."FROM `nilai`"
													."JOIN `guru`"
													."ON `nilai`.`id_guru` = `guru`.`id`"
													."JOIN `mapel`"
													."ON `guru`.`id_mapel` = `mapel`.`id`"
													."WHERE `nilai`.`id_siswa` = $id_siswa AND `nilai`.`semester` = $semester";
											$sql = mysqli_query($conn,$query);
											if (mysqli_num_rows($sql) == 0) {
							?>
												<tr>
													<td colspan="8">Data Kosong</td>
												</tr>
							<?php
											}
											else {
												$i = 1;
												$total = 0;
												while ($data = mysqli_fetch_assoc($sql)) {
													$total = ($data['tugas1'] + $data['tugas2']
															+ $data['kuis'] + $data['uts']
															+ $data['uas']) / 5;
							?>
													<tr>
														<td><?=$i?></td>
														<td><?=$data['mapel']?></td>
														<td><?=$data['tugas1']?></td>
														<td><?=$data['tugas2']?></td>
														<td><?=$data['kuis']?></td>
														<td><?=$data['uts']?></td>
														<td><?=$data['uas']?></td>
														<td><?=$total?></td>
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
			<!-- End Lihat Nilai Nilai Siswa -->

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