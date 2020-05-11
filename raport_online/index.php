<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
	<div class="container-fluid" style="border-radius: 0.25rem; padding: 0; overflow: auto; background-image: url('img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
		<!-- Start Content -->
		<div class="card" style="margin: 30vh auto; width: 25vw;">
			<div class="card-body mx-auto">
				<!-- Start Header -->
				<div class="text-uppercase text-center">
					<h3>Login</h3>
				</div>
				<!-- End Header -->

				<!-- Start Pesan -->
				<?php
					if (isset($_GET['pesan'])) {	
						if ($_GET['pesan'] == "gagal") {
							$pesan = "Login gagal!";
						}
						else if ($_GET['pesan'] == "logout") {
							$pesan = "Berhasil logout!";
						}
						else if ($_GET['pesan'] == "belum_login") {
							$pesan = "Login dulu!";
						}
					}
					else {
						$pesan = "<br>";
					} 
				?>
				<div class="font-italic font-weight-bold">
					<h6><?=$pesan?></h6>
				</div>
				<!-- End Pesan -->

				<!-- Start Form Login -->
				<form action="cek_login.php" method="POST">

					<!-- Start Atribut Username -->
		  			<div class="form-group row">
		  				<label for="inputUsername" class="col-sm-4 col-form-label">Username</label>
		  				<div class="col-sm-8">
		  					<input type="text" class="form-control" placeholder="Username" id="inputUsername" name="username">
		  				</div>
		  			</div>
		  			<!-- End Atribut Username -->

		  			<!-- Start Atribut Password -->
		  			<div class="form-group row">
		  				<label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
		  				<div class="col-sm-8">
		  					<input type="password" class="form-control" placeholder="Password" id="inputPassword" name="password">
		  				</div>
		  			</div>
		  			<!-- End Atribut Password -->

					<!-- Start Atribut Button -->
		  			<div class="text-center">
		  				<input type="submit" class="btn btn-primary" name="submit" value="Login">
		  			</div>
		  			<!-- End Atribut Button -->
				</form>
				<!-- End Form Login -->		
			</div>
		</div>
		<!-- End Content -->

		<!-- Start Footer -->
		<div class="card bg-dark">
			<div class="card-header text-light" style="padding: 1.2vh;">
				Copyright&copy; Sakti
			</div>
		</div>
		<!-- End Footer -->
	</div>
	<!-- End Container -->
</body>
</html>