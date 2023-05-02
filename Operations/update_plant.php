<?php 
	include("../connection.php");
	
	$id = $_POST["id"];
	$name = $_POST["name"];
	$planted_on = $_POST["planted_on"];
	$health_status = $_POST["health_status"];
	$notes = $_POST["notes"];
	
	$sql = "UPDATE plant SET
				name='{$name}',
				planted_on='{$planted_on}',
				health_status='{$health_status}',
				notes='{$notes}'
			WHERE id='{$id}'";
			
	mysqli_query($connection,$sql) or die("Opa! Houve algum erro. \n" . mysqli_error($connection));
	header('Location:../index.php');
?>