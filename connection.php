<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "gardenmanagement";

	$connection = mysqli_connect($server, $user, $password, $database) or die("Uuups! Deu algo de errado na conexão com o servidor " . mysqli_connect_error());
?>