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
			<h5>Selamat Datang, <?=$_SESSION['username']?>!</h5>
		</div>
		<!-- End Header -->

		<!-- Start Set Mode -->
		<?php
			if (isset($_GET['mode'])) {
				if ($_GET['mode'] == 'data_siswa') {
					$mode = 'siswa';
				}
				else if ($_GET['mode'] == 'data_guru') {
					$mode = 'guru';
				}
				else if ($_GET['mode'] == 'data_user') {
					$mode = 'user';
				}
				else if ($_GET['mode'] == 'data_kelas') {
					$mode = 'kelas';
				}
				else if ($_GET['mode'] == 'data_mapel') {
					$mode = 'mapel';
				}
			}
		?>
		<!-- End Set Mode -->

		<!-- Start Sidebar -->
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="width: 15%; height: 100%; margin: 0 auto; overflow: auto; float: left;">
			<a class="nav-link active disabled" id="v-pills-olah-data-<?=$mode?>-tab" data-toggle="pill" href="#v-pills-olah-data-<?=$mode?>" role="tab" aria-controls="v-pills-olah-data-<?=$mode?>" aria-selected="true">Olah Data <?=ucfirst($mode)?></a>
			<a class="nav-link" href="home.php" role="button">Back</a>
		</div>
		<!-- End Sidebar -->

		<!-- Start Content -->
		<div class="tab-content" id="v-pills-tabContent" style="width: 83%; height: 86.6vh; margin: 10px auto; overflow: auto; border: 1px solid black; background-color: white;" >

			<!-- Start Olah Data Siswa -->
			<div class="tab-pane fade <?=$_GET['mode'] == 'data_siswa' ? "show active" : ""?>" id="v-pills-olah-data-siswa" role="tabpanel" aria-labelledby="v-pills-olah-data-siswa-tab">
				<!-- Start Content Siswa -->
				<div style="margin: 10px;">
					<h6>Tambah Data Siswa</h6>
					<!-- Start Form Siswa -->
					<form action="create.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Atribut NIS -->
			  			<div class="form-group row">
			  				<label for="inputNis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="NIS" id="inputNis" name="nis">
			  				</div>
			  			</div>
			  			<!-- End Atribut NIS -->

			  			<!-- Start Atribut Nama -->
			  			<div class="form-group row">
			  				<label for="inputNamaSiswa" class="col-sm-2 col-form-label">Nama Siswa</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Nama" id="inputNamaSiswa" name="nama_siswa">
			  				</div>
			  			</div>
			  			<!-- End Atribut Nama -->

			  			<!-- Start Atribut Kelas -->
			  			<div class="form-group row">
			  				<label for="inputSelectKelas" class="col-sm-2 col-form-label">Kelas</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputSelectKelas" name="id_kelas">
			  						<option>-- Pilih Kelas --</option>
			  						<?php
			  							include '../koneksi.php';
										$query = "SELECT `id`,`kelas` FROM `kelas`";
										$sql = mysqli_query($conn,$query);
										while ($data=mysqli_fetch_assoc($sql)){
									?>
										<option value="<?=$data['id']?>"><?=$data['kelas']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Kelas -->

			  			<!-- Start Atribut Nama Ortu -->
			  			<div class="form-group row">
			  				<label for="inputNamaOrtu" class="col-sm-2 col-form-label">Nama Ortu Siswa</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Nama Ortu" id="inputNamaOrtu" name="nama_ortu">
			  				</div>
			  			</div>
			  			<!-- End Atribut Nama Ortu-->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Submit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitSiswaModal">Submit</button>
							<!-- End Submit Button Trigger Modal -->

							<!-- Start Submit Modal -->
							<div class="modal fade text-dark" id="submitSiswaModal" tabindex="-1" role="dialog" aria-labelledby="submitSiswaModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="submitSiswaModalLabel">Submit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin menambah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Submit Modal -->

			  				<input type="reset" class="btn btn-primary" name="reset" value="Reset">
			  			</div>
			  			<!-- End Atribut Button -->
					</form>
					<!-- End Form Siswa -->
				</div>
				<!-- End Content Siswa -->
			</div>
			<!-- End Olah Data Siswa -->

			<!-- Start Olah Data Guru -->
			<div class="tab-pane fade <?=$_GET['mode'] == 'data_guru' ? "show active" : ""?>" id="v-pills-olah-data-guru" role="tabpanel" aria-labelledby="v-pills-olah-data-guru-tab">
				<!-- Start Content Guru -->
				<div style="margin: 10px;">
					<h6>Tambah Data Guru</h6>
					<!-- Start Form Guru -->
					<form action="create.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Atribut NIP -->
			  			<div class="form-group row">
			  				<label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="NIP" id="inputNip" name="nip">
			  				</div>
			  			</div>
			  			<!-- End Atribut NIP -->

			  			<!-- Start Atribut Nama -->
			  			<div class="form-group row">
			  				<label for="inputNamaGuru" class="col-sm-2 col-form-label">Nama Guru</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Nama" id="inputNamaGuru" name="nama_guru">
			  				</div>
			  			</div>
			  			<!-- End Atribut Nama -->

			  			<!-- Start Atribut Mapel -->
			  			<div class="form-group row">
			  				<label for="inputSelectMapel" class="col-sm-2 col-form-label">Mapel</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputSelectMapel" name="id_mapel">
			  						<option>-- Pilih Mapel --</option>
			  						<?php
			  							include '../koneksi.php';
										$query = "SELECT `id`,`mapel` FROM `mapel`";
										$sql = mysqli_query($conn,$query);
										while ($data=mysqli_fetch_assoc($sql)){
									?>
										<option value="<?=$data['id']?>"><?=$data['mapel']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Mapel -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Submit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitGuruModal">Submit</button>
							<!-- End Submit Button Trigger Modal -->

							<!-- Start Submit Modal -->
							<div class="modal fade text-dark" id="submitGuruModal" tabindex="-1" role="dialog" aria-labelledby="submitGuruModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="submitGuruModalLabel">Submit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin menambah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Submit Modal -->

			  				<input type="reset" class="btn btn-primary" name="reset" value="Reset">
			  			</div>
			  			<!-- End Atribut Button -->
					</form>
					<!-- End Form Guru -->
				</div>
				<!-- End Content Guru -->
			</div>
			<!-- End Olah Data Guru -->

			<!-- Start Olah Data User -->
			<div class="tab-pane fade <?=$_GET['mode'] == 'data_user' ? "show active" : ""?>" id="v-pills-olah-data-guru" role="tabpanel" aria-labelledby="v-pills-olah-data-guru-tab">
				<!-- Start Content User -->
				<div style="margin: 10px;">
					<h6>Tambah Data User</h6>
					<!-- Start Form User -->
					<form action="create.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Atribut Username -->
			  			<div class="form-group row">
			  				<label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Username" id="inputUsername" name="username">
			  				</div>
			  			</div>
			  			<!-- End Atribut Username -->

			  			<!-- Start Atribut Password -->
			  			<div class="form-group row">
			  				<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
			  				<div class="col-sm-3">
			  					<input type="password" class="form-control" placeholder="Password" id="inputPassword" name="password">
			  				</div>
			  			</div>
			  			<!-- End Atribut Password -->

			  			<!-- Start Atribut Role -->
			  			<div class="form-group row">
			  				<label for="inputRole" class="col-sm-2 col-form-label">Role</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputRole" name="id_role">
			  						<option>-- Pilih Role --</option>
			  						<?php
			  							include '../koneksi.php';
										$query = "SELECT `id`,`role` FROM `role`";
										$sql = mysqli_query($conn,$query);
										while ($data=mysqli_fetch_assoc($sql)){
									?>
										<option value="<?=$data['id']?>"><?=$data['role']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Role -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Submit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitUserModal">Submit</button>
							<!-- End Submit Button Trigger Modal -->

							<!-- Start Submit Modal -->
							<div class="modal fade text-dark" id="submitUserModal" tabindex="-1" role="dialog" aria-labelledby="submitUserModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="submitUserModalLabel">Submit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin menambah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Submit Modal -->

			  				<input type="reset" class="btn btn-primary" name="reset" value="Reset">
			  			</div>
			  			<!-- End Atribut Button -->
					</form>
					<!-- End Form User -->
				</div>
				<!-- End Content User -->
			</div>
			<!-- End Olah Data User -->

			<!-- Start Olah Data Kelas -->
			<div class="tab-pane fade <?=$_GET['mode'] == 'data_kelas' ? "show active" : ""?>" id="v-pills-olah-data-guru" role="tabpanel" aria-labelledby="v-pills-olah-data-guru-tab">
				<!-- Start Content Kelas -->
				<div style="margin: 10px;">
					<h6>Tambah Data Kelas</h6>
					<!-- Start Form Kelas -->
					<form action="create.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Atribut Kelas -->
			  			<div class="form-group row">
			  				<label for="inputKelas" class="col-sm-2 col-form-label">Kelas</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Kelas" id="inputKelas" name="kelas">
			  				</div>
			  			</div>
			  			<!-- End Atribut Kelas -->

			  			<!-- Start Atribut Wali Kelas -->
			  			<div class="form-group row">
			  				<label for="inputWaliKelas" class="col-sm-2 col-form-label">Wali Kelas</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputWaliKelas" name="id_guru">
			  						<option>-- Pilih Wali Kelas --</option>
			  						<?php
			  							include '../koneksi.php';
										$query = "SELECT `id`, CONCAT(`nip`,' - ',`nama`) AS guru FROM `guru`";
										$sql = mysqli_query($conn,$query);
										while ($data=mysqli_fetch_assoc($sql)){
									?>
										<option value="<?=$data['id']?>"><?=$data['guru']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Wali Kelas -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Submit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitKelasModal">Submit</button>
							<!-- End Submit Button Trigger Modal -->

							<!-- Start Submit Modal -->
							<div class="modal fade text-dark" id="submitKelasModal" tabindex="-1" role="dialog" aria-labelledby="submitKelasModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="submitKelasModalLabel">Submit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin menambah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Submit Modal -->

			  				<input type="reset" class="btn btn-primary" name="reset" value="Reset">
			  			</div>
			  			<!-- End Atribut Button -->
					</form>
					<!-- End Form Kelas -->
				</div>
				<!-- End Content Kelas -->
			</div>
			<!-- End Olah Data Kelas -->

			<!-- Start Olah Data Mapel -->
			<div class="tab-pane fade <?=$_GET['mode'] == 'data_mapel' ? "show active" : ""?>" id="v-pills-olah-data-guru" role="tabpanel" aria-labelledby="v-pills-olah-data-guru-tab">
				<!-- Start Content Mapel -->
				<div style="margin: 10px;">
					<h6>Tambah Data Mapel</h6>
					<!-- Start Form Mapel -->
					<form action="create.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Atribut Mapel -->
			  			<div class="form-group row">
			  				<label for="inputMapel" class="col-sm-2 col-form-label">Mapel</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Mapel" id="inputMapel" name="mapel">
			  				</div>
			  			</div>
			  			<!-- End Atribut Mapel -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Submit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitMapelModal">Submit</button>
							<!-- End Submit Button Trigger Modal -->

							<!-- Start Submit Modal -->
							<div class="modal fade text-dark" id="submitMapelModal" tabindex="-1" role="dialog" aria-labelledby="submitMapelModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="submitMapelModalLabel">Submit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin menambah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Submit Modal -->

			  				<input type="reset" class="btn btn-primary" name="reset" value="Reset">
			  			</div>
			  			<!-- End Atribut Button -->
					</form>
					<!-- End Form Mapel -->
				</div>
				<!-- End Content Mapel -->
			</div>
			<!-- End Olah Data Mapel -->
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