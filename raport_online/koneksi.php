<?php
	$conn = new mysqli('mysql-server','root','root','raport_online');
	if ($conn->connect_error){
		die("Error: " . mysqli_connect_error());
	}
?>