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
	<!-- Start Container -->
	<div class="container-fluid" style="border-radius: 0.25rem; padding: 0; max-width: 100%; overflow: auto; background-image: url('../img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
		<!-- Start Header -->
		<div class="font-italic" style="margin: 10px 15px;">
			<h5>Selamat Datang, Guru dengan NIP <?=$_SESSION['username']?>!</h5>
		</div>
		<!-- End Header -->

		<!-- Start Sidebar -->
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="width: 15%; height: 100%; margin: 0 auto; overflow: auto; float: left;">
			<a class="nav-link active disabled" id="v-pills-olah-nilai-siswa-tab" data-toggle="pill" href="#v-pills-olah-nilai-siswa" role="tab" aria-controls="v-pills-olah-nilai-siswa" aria-selected="true">Olah Nilai Siswa</a>
			<a class="nav-link" href="home.php" role="button">Back</a>
		</div>
		<!-- End Sidebar -->

		<!-- Start Content -->
		<div class="tab-content" id="v-pills-tabContent" style="max-width: 83%; height: 86.6vh; margin: 10px auto; overflow: auto; border: 1px solid black; background-color: white;" >
			<!-- Start Olah Nilai Siswa -->
			<div class="tab-pane fade show active" id="v-pills-olah-nilai-siswa" role="tabpanel" aria-labelledby="v-pills-olah-nilai-siswa-tab">
				<!-- Start Content Nilai Siswa -->
				<div style="margin: 10px;">
					<!-- Set Var utk Header -->
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
						$nis = $_POST['nis'];
						$nama = $_POST['nama'];
						$semester = $_POST['semester'];
						$id_kelas = $_POST['id_kelas'];
						$query = "SELECT `kelas` FROM `kelas` WHERE `id` = $id_kelas";
						$sql = mysqli_query($conn,$query);
						$data = mysqli_fetch_assoc($sql);
						$kelas = $data['kelas'];
						$query = "SELECT `id` AS id_siswa FROM `siswa` WHERE `nis` = $nis";
						$sql = mysqli_query($conn,$query);
						$data = mysqli_fetch_assoc($sql);
						$id_siswa = $data['id_siswa'];
					?>
					<h6>Olah Nilai Mapel <?=$mapel?></h6>
					<h6>untuk <?=$nis?> - <?=$nama?> Kelas <?=$kelas?> Semester <?=$semester?></h6>
					<form action="update.php" method="POST" style="width: 80vw;">
						<?php
							include '../koneksi.php';
							$id = $_GET['id'];
							$tugas1 = $_POST['tugas1'];
							$tugas2 = $_POST['tugas2'];
							$kuis = $_POST['kuis'];
							$uts = $_POST['uts'];
							$uas = $_POST['uas'];
						?>

						<!-- Start Atribut Hidden -->
						<input type="hidden" name="id" value="<?=$id?>">
						<input type="hidden" name="id_siswa" value="<?=$id_siswa?>">
						<input type="hidden" name="id_guru" value="<?=$id_guru?>">
						<input type="hidden" name="semester" value="<?=$semester?>">
						<!-- End Atribut Hidden -->

						<!-- Start Atribut Tugas1 -->
			  			<div class="form-group row">
			  				<label for="inputTugas1" class="col-sm-2 col-form-label">Tugas 1</label>
			  				<div class="col-sm-3">
			  					<input type="number" min="0" max="100" class="form-control" placeholder="Nilai Tugas 1" id="inputTugas1" name="tugas1" value="<?=$tugas1?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Tugas1 -->

			  			<!-- Start Atribut Tugas2 -->
			  			<div class="form-group row">
			  				<label for="inputTugas2" class="col-sm-2 col-form-label">Tugas 2</label>
			  				<div class="col-sm-3">
			  					<input type="number" min="0" max="100" class="form-control" placeholder="Nilai Tugas 2" id="inputTugas2" name="tugas2" value="<?=$tugas2?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Tugas2 -->

			  			<!-- Start Atribut Kuis -->
			  			<div class="form-group row">
			  				<label for="inputKuis" class="col-sm-2 col-form-label">Kuis</label>
			  				<div class="col-sm-3">
			  					<input type="number" min="0" max="100" class="form-control" placeholder="Nilai Kuis" id="inputKuis" name="kuis" value="<?=$kuis?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Kuis -->

			  			<!-- Start Atribut UTS -->
			  			<div class="form-group row">
			  				<label for="inputUTS" class="col-sm-2 col-form-label">UTS</label>
			  				<div class="col-sm-3">
			  					<input type="number" min="0" max="100" class="form-control" placeholder="Nilai UTS" id="inputUTS" name="uts" value="<?=$uts?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut UTS -->

			  			<!-- Start Atribut UAS -->
			  			<div class="form-group row">
			  				<label for="inputUAS" class="col-sm-2 col-form-label">UAS</label>
			  				<div class="col-sm-3">
			  					<input type="number" min="0" max="100" class="form-control" placeholder="Nilai UAS" id="inputUAS" name="uas" value="<?=$uas?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut UAS -->

			  			<!-- Start Submit Button Trigger Modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitNilaiSiswaModal">Submit</button>
						<!-- End Submit Button Trigger Modal -->

						<!-- Start Submit Modal -->
						<div class="modal fade text-dark" id="submitNilaiSiswaModal" tabindex="-1" role="dialog" aria-labelledby="submitNilaiSiswaModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="submitNilaiSiswaModalLabel">Submit Confirmation</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body text-left">Anda yakin ingin menambah atau mengubah data ini?</div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
						      </div>
						    </div>
						  </div>
						</div>
						<!-- End Submit Modal -->

		  				<input type="reset" class="btn btn-primary" name="reset" value="Reset">
					</form>
				</div>
				<!-- End Content Nilai Siswa -->
			</div>
			<!-- End Olah Nilai Nilai Siswa -->
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