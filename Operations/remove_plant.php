<?php
// tudo isso dentro de uma funчуo
/*	$id = $_GET["id"];
	
	$sql = "DELETE FROM
				plant
	        WHERE id='{$id}'";
			
	mysqli_query($connection,$sql) or die("Opa! Houve algum erro. \n" . mysqli_error(connection));
	header('Location:../index.php'); // Talvez o que estс causando o erro щ que o header estс sendo alterado duas vezes seguidas, no index, e aqui.*/
	
		include('../connection.php');
		
		$id = $_POST['id'];
		
		$sql = "DELETE FROM
				plant
	        WHERE id='{$id}'";
			
		mysqli_query($connection,$sql) or die("Opa! Houve algum erro. \n" . mysqli_error(connection));
		//header('Location:../index.php');
?>