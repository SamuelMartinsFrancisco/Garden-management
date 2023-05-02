<?php
	include("../connection.php");

	$name = $_POST["name"];
	$planted_on = $_POST["planted_on"];
	$health_status = $_POST["health_status"];
	$notes = $_POST["notes"];

	$sql = "INSERT INTO plant(name,planted_on,health_status, notes)
	             VALUES('{$name}','{$planted_on}','{$health_status}','{$notes}')";

	mysqli_query($connection,$sql) or die("Opa! Houve algum erro. \n" . mysqli_error(connection));
	header('Location:../index.php');
?>