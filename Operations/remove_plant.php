<?php
	$id = $_GET["id"];
	
	$sql = "DELETE FROM
				plant
	        WHERE id='{$id}'";
			
	mysqli_query($connection,$sql) or die("Opa! Houve algum erro. \n" . mysqli_error(connection));
	header('Location:index.php');
?>