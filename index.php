<?php
	include("connection.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gerenciamento de Hortas </title>
	</head>
	<body>
		<H2> Gerenciamento da Horta </h2>
		
		<div>
			<form action="operations/add_plant.php" method="post">
				<p><label> Nome da planta <input name="name"> </label></p>
				<?php
					echo "
						<p><label> Data do plantio <input type=date name=\"planted_on\" value=\"" . date("Y-m-d") . "\"> </label></p>
					"
				?>
				<p>
					<label> Status 
					   	<input type=radio name="health_status" value="Verde" checked> Verde
						<input type=radio name="health_status" value="Amarelo"> Amarelo
						<input type=radio name="health_status" value="Laranja"> Laranja
						<input type=radio name="health_status" value="Vermelho"> Vermelho
				       </label>
				</p>
				<p><textarea name="notes" rows="5" columns="40" placeholder="Anotações"></textarea></p>
				<p>
					<input type="submit" value="Salvar">
					<input type="reset" value="Limpar campos">
				</p>
			</form>
		</div>
		<br>
		<table border="1" cellpadding="4">
			<thead>
				<tr>
					<th> Planta &#127813 </th>
					<th> Data de Plantio &#9203 </th>
					<th> Status &#11088 </th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT 
						name, 
						date_format(planted_on, '%d/%m/%Y') as planted_on, 
						health_status,
						id
					        FROM 
						plant";
					$plants_list = mysqli_query($connection, $sql) or die("Eita! Não consegui acessar sua lista de plantas" . mysqli_error($connection));

					$health_status_color = 'green';
					while($data = mysqli_fetch_assoc($plants_list)) {
						switch ($data["health_status"]) {
							case 'Verde':
								$health_status_color = 'green';
								break;
							case 'Amarelo':
								$health_status_color = 'yellow';
								break;
							case 'Laranja':
								$health_status_color = 'orange';
								break;
							case 'Vermelho':
								$health_status_color = 'red';
								break;
						}

						echo "
							<tr>
								<td>" . $data["name"] ."</td>
								<td align='center'>" . $data["planted_on"] . "</td>
								<td bgcolor='" . $health_status_color . "'>" . $data["health_status"] . "</td>
								<td> 
									<a href='?operation=remove&id=" . $data["id"] . "'> <img src='images/remove.svg'> </a>
									<a href='?operation=update&id=" . $data["id"] . "'> <img src='images/update.svg'> </a>
								</td>	
							<tr>
						";
					}
				?>
			</tbody>
		</table>
		
		<!--<form action=\"operations/remove_plant.php\" method=\"post\">
										<input type=hidden name=\"id\" value=\"" . $data["id"] . "\">
										<input type=submit name=\"remove_plant\" value=\"X\"> 
									</form> -->
	
	<?php
		if (isset($_GET["operation"])) { 
			$operation = $_GET["operation"];
			
			switch ($operation) {
				case "remove":
					include("./operations/remove_plant.php");
					break;
				case "update":
					include("update_plant_form.php");  // as atualizações não estão funcionando. Talvez haja algo de errado com a referenciação do elemento por meio do ID;
					break;
			}
		}
	?>
	</body>
</html>