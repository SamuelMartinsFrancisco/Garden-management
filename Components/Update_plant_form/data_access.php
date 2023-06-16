<?php
	$id = $_GET["id"];
					
		$sql = "SELECT * FROM plant WHERE id = '{$id}'";
		$get_plant = mysqli_query($connection,$sql) or die("Opa! Houve algum erro. \n" . mysqli_error($connection));
		$data = mysqli_fetch_assoc($get_plant);
		
		$name = $data["name"];
		$planted_on = $data["planted_on"];
		$health_status = $data["health_status"];
		$notes = $data["notes"];
		
		$checked_health_status = ["checked", null, null, null];
		switch($health_status) {
			case "Amarelo":
				$checked_health_status = [null, "checked", null, null];
				break;
			case "Laranja":
				$checked_health_status = [null, null, "checked", null];
				break;
			case "Vermelho":
				$checked_health_status = [null, null, null, "checked"];
				break;
			default: 
				$checked_health_status = ["checked", null, null, null];
				break;
		}
?>