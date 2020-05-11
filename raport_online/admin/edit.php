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
					<h6>Edit Data Siswa</h6>
					<!-- Start Form Siswa -->
					<form action="update.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Set and Get Data Siswa -->
						<?php
							include '../koneksi.php';
							$id = $_GET['id'];
							$query = "SELECT `siswa`.*, `kelas`.`kelas` FROM `siswa`"
									."JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id`"
									."WHERE `siswa`.`id` = $id";
							$sql = mysqli_query($conn,$query);
						    $data = mysqli_fetch_assoc($sql);
						?>
						<!-- End Set and Get Data Siswa -->

						<!-- Start Atribut Id -->
						<input type="hidden" name="id" value="<?=$id?>">
						<!-- End Atribut Id -->

						<!-- Start Atribut NIS -->
			  			<div class="form-group row">
			  				<label for="inputNis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="NIS" id="inputNis" name="nis" value="<?=$data['nis']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut NIS -->

			  			<!-- Start Atribut Nama -->
			  			<div class="form-group row">
			  				<label for="inputNamaSiswa" class="col-sm-2 col-form-label">Nama Siswa</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Nama" id="inputNamaSiswa" name="nama_siswa" value="<?=$data['nama']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Nama -->

			  			<!-- Start Atribut Kelas -->
			  			<div class="form-group row">
			  				<label for="inputSelectKelas" class="col-sm-2 col-form-label">Kelas</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputSelectKelas" name="id_kelas">
			  						<?php
			  							include '../koneksi.php';
										$query_kelas = "SELECT `id`,`kelas` FROM `kelas`";
										$sql_kelas = mysqli_query($conn,$query_kelas);
										while ($data_kelas=mysqli_fetch_assoc($sql_kelas)){
									?>
										<option <?=$data_kelas['id'] == $data['id_kelas'] ? "selected" : ""?> value="<?=$data_kelas['id']?>"><?=$data_kelas['kelas']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Kelas -->

			  			<!-- Start Atribut Nama Ortu -->
			  			<div class="form-group row">
			  				<label for="inputNamaOrtu" class="col-sm-2 col-form-label">Nama Ortu Siswa</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Nama Ortu" id="inputNamaOrtu" name="nama_ortu" value="<?=$data['nama_ortu']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Nama Ortu-->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Edit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSiswaModal">Edit</button>
							<!-- End Edit Button Trigger Modal -->

							<!-- Start Edit Modal -->
							<div class="modal fade text-dark" id="editSiswaModal" tabindex="-1" role="dialog" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="editSiswaModalLabel">Edit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin mengubah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Edit Modal -->

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
					<h6>Edit Data Guru</h6>
					<!-- Start Form Guru -->
					<form action="update.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Set and Get Data Guru -->
						<?php
							include '../koneksi.php';
							$id = $_GET['id'];
							$query = "SELECT `guru`.*, `mapel`.`mapel` FROM `guru`"
									."JOIN `mapel` ON `guru`.`id_mapel` = `mapel`.`id`"
									."WHERE `guru`.`id` = $id";
							$sql = mysqli_query($conn,$query);
						    $data = mysqli_fetch_assoc($sql);
						?>
						<!-- End Set and Get Data Guru -->

						<!-- Start Atribut Id -->
						<input type="hidden" name="id" value="<?=$id?>">
						<!-- End Atribut Id -->

						<!-- Start Atribut NIP -->
			  			<div class="form-group row">
			  				<label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="NIP" id="inputNip" name="nip" value="<?=$data['nip']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut NIP -->

			  			<!-- Start Atribut Nama -->
			  			<div class="form-group row">
			  				<label for="inputNamaGuru" class="col-sm-2 col-form-label">Nama Guru</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Nama" id="inputNamaGuru" name="nama_guru" value="<?=$data['nama']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Nama -->

			  			<!-- Start Atribut Mapel -->
			  			<div class="form-group row">
			  				<label for="inputSelectMapel" class="col-sm-2 col-form-label">Mapel</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputSelectMapel" name="id_mapel">
			  						<?php
			  							include '../koneksi.php';
										$query_mapel = "SELECT `id`,`mapel` FROM `mapel`";
										$sql_mapel = mysqli_query($conn,$query_mapel);
										while ($data_mapel=mysqli_fetch_assoc($sql_mapel)){
									?>
										<option <?=$data_mapel['id'] == $data['id_mapel'] ? "selected" : ""?> value="<?=$data_mapel['id']?>"><?=$data_mapel['mapel']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Mapel -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Edit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editGuruModal">Edit</button>
							<!-- End Edit Button Trigger Modal -->

							<!-- Start Edit Modal -->
							<div class="modal fade text-dark" id="editGuruModal" tabindex="-1" role="dialog" aria-labelledby="editGuruModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="editGuruModalLabel">Edit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin mengubah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Edit Modal -->

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
					<h6>Edit Data User</h6>
					<!-- Start Form User -->
					<form action="update.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Set and Get Data User -->
						<?php
							include '../koneksi.php';
							$id = $_GET['id'];
							$query = "SELECT `user`.`id`,"
										."`user`.`username`,"
										."`user`.`password`,"
										."`user`.`id_role`,"
										."`role`.`role` FROM `user`"
										."JOIN `role`"
										."ON `user`.`id_role` = `role`.`id`"
										."WHERE `user`.`id` = $id";
							$sql = mysqli_query($conn,$query);
						    $data = mysqli_fetch_assoc($sql);
						?>
						<!-- End Set and Get Data User -->

						<!-- Start Atribut Id -->
						<input type="hidden" name="id" value="<?=$id?>">
						<!-- End Atribut Id -->

						<!-- Start Atribut Username -->
			  			<div class="form-group row">
			  				<label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Username" id="inputUsername" name="username" value="<?=$data['username']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Username -->

			  			<!-- Start Atribut Password -->
			  			<div class="form-group row">
			  				<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
			  				<div class="col-sm-3">
			  					<input type="password" class="form-control" placeholder="Password" id="inputPassword" name="password" value="<?=$data['password']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Password -->

			  			<!-- Start Atribut Role -->
			  			<div class="form-group row">
			  				<label for="inputRole" class="col-sm-2 col-form-label">Role</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputRole" name="id_role">
			  						<?php
			  							include '../koneksi.php';
										$query_role = "SELECT `id`,`role` FROM `role`";
										$sql_role = mysqli_query($conn,$query_role);
										while ($data_role=mysqli_fetch_assoc($sql_role)){
									?>
										<option <?=$data_role['id'] == $data['id_role'] ? "selected" : ""?> value="<?=$data_role['id']?>"><?=$data_role['role']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Role -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Edit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal">Edit</button>
							<!-- End Edit Button Trigger Modal -->

							<!-- Start Edit Modal -->
							<div class="modal fade text-dark" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="editUserModalLabel">Edit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin mengubah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Edit Modal -->

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
					<h6>Edit Data Kelas</h6>
					<!-- Start Form Kelas -->
					<form action="update.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Set and Get Data Kelas -->
						<?php
							include '../koneksi.php';
							$id = $_GET['id'];
							$query = "SELECT * FROM `kelas` WHERE `id` = $id";
							$sql = mysqli_query($conn,$query);
						    $data = mysqli_fetch_assoc($sql);
						?>
						<!-- End Set and Get Data Kelas -->

						<!-- Start Atribut Id -->
						<input type="hidden" name="id" value="<?=$id?>">
						<!-- End Atribut Id -->

						<!-- Start Atribut Kelas -->
			  			<div class="form-group row">
			  				<label for="inputKelas" class="col-sm-2 col-form-label">Kelas</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Kelas" id="inputKelas" name="kelas" value="<?=$data['kelas']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Kelas -->

			  			<!-- Start Atribut Wali Kelas -->
			  			<div class="form-group row">
			  				<label for="inputWaliKelas" class="col-sm-2 col-form-label">Wali Kelas</label>
			  				<div class="col-sm-3">
			  					<select class="form-control" id="inputWaliKelas" name="id_guru">
			  						<?php
			  							include '../koneksi.php';
										$query_kelas = "SELECT `id`, CONCAT(`nip`,' - ',`nama`) AS guru FROM `guru`";
										$sql_kelas = mysqli_query($conn,$query_kelas);
										while ($data_kelas=mysqli_fetch_assoc($sql_kelas)){
									?>
										<option <?=$data_kelas['id'] == $data['id'] ? "selected" : ""?> value="<?=$data_kelas['id']?>"><?=$data_kelas['guru']?></option>
								<?php } ?>
			  					</select>
			  				</div>
			  			</div>
			  			<!-- End Atribut Wali Kelas -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Edit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editKelasModal">Edit</button>
							<!-- End Edit Button Trigger Modal -->

							<!-- Start Edit Modal -->
							<div class="modal fade text-dark" id="editKelasModal" tabindex="-1" role="dialog" aria-labelledby="editKelasModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="editKelasModalLabel">Edit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin mengubah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Edit Modal -->

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
					<h6>Edit Data Mapel</h6>
					<!-- Start Form Mapel -->
					<form action="update.php?mode=<?=$_GET['mode']?>" method="POST" style="width: 80vw;">
						<!-- Start Set and Get Data Mapel -->
						<?php
							include '../koneksi.php';
							$id = $_GET['id'];
							$query = "SELECT * FROM `mapel` WHERE `id` = $id";
							$sql = mysqli_query($conn,$query);
						    $data = mysqli_fetch_assoc($sql);
						?>
						<!-- End Set and Get Data Mapel -->

						<!-- Start Atribut Id -->
						<input type="hidden" name="id" value="<?=$id?>">
						<!-- End Atribut Id -->

						<!-- Start Atribut Mapel -->
			  			<div class="form-group row">
			  				<label for="inputMapel" class="col-sm-2 col-form-label">Mapel</label>
			  				<div class="col-sm-3">
			  					<input type="text" class="form-control" placeholder="Mapel" id="inputMapel" name="mapel" value="<?=$data['mapel']?>">
			  				</div>
			  			</div>
			  			<!-- End Atribut Mapel -->

			  			<!-- Start Atribut Button -->
			  			<div style="margin-left: 15vw;">
			  				<!-- Start Edit Button Trigger Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editMapelModal">Edit</button>
							<!-- End Edit Button Trigger Modal -->

							<!-- Start Edit Modal -->
							<div class="modal fade text-dark" id="editMapelModal" tabindex="-1" role="dialog" aria-labelledby="editMapelModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="editMapelModalLabel">Edit Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">Anda yakin ingin mengubah data ini?</div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Edit Modal -->

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