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
	
	echo "
		<div>
			<form action=\"operations/update_plant.php\" method=\"post\">
				<input type=hidden name=\"id\" value={$id}>
				<p><label> Nome da planta <input name=\"name\" value={$name}> </label></p>
				<p><label> Data do plantio <input type=date name=\"planted_on\" value={$planted_on}> </label></p>
				<p>
					<label> Status 
					   	<input type=radio name=\"health_status\" value=\"Verde\" {$checked_health_status[0]}> Verde
						<input type=radio name=\"health_status\" value=\"Amarelo\" {$checked_health_status[1]}> Amarelo
						<input type=radio name=\"health_status\" value=\"Laranja\" {$checked_health_status[2]}> Laranja
						<input type=radio name=\"health_status\" value=\"Vermelho\" {$checked_health_status[3]}> Vermelho
				    </label>
				</p>
				<p><textarea name=\"notes\" rows=\"5\" columns=\"40\" placeholder=\"Anotações\"> {$notes} </textarea></p>
				<p>
					<input type=submit value=\"Salvar\">
					<input type=reset value=\"Limpar campos\">
				</p>
			</form>
		</div>
	";
?>