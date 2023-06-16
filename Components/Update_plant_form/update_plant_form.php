<?php
	include("../../connection.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Formulário de edição</title>
		<link rel="stylesheet" type="text/css" href="update_plant_form.css">
	</head>
	<body>
		<div class="container">
			<form action="../../operations/update_plant.php" method="post">
				<?php
					include("data_access.php");
					
					echo "
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
						";
				?>
				<p>
					<input type=submit value="Salvar">
					<input type=reset value="Limpar campos">
				</p>
			</form>
		</div>
	</body>
</html>