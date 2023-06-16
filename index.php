<?php
	include('connection.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gerenciamento de Hortas </title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<div class="container">
			<h2 class="title"> Gerenciamento da Horta </h2>
			
			<div class="add_plant_form">
				<form action="operations/add_plant.php" method="post">
					<div class="name">
						<label> Nome da planta </label>
						<input name="name" required="required" placeholder="Cebolinha"> 
					</div>
					
					<?php
						echo "
							<div class=\"date\">
								<label> Data do plantio </label>
								<input type=date name=\"planted_on\" value=\"" . date("Y-m-d") . "\">
							</div>
						"
					?>
					
					<div class="status">
						<label> Status </label>
						<div class="options">
							<input type=radio name="health_status" value="Verde" checked> 
							  <span class="radio_button"></span>
							<input type=radio name="health_status" value="Amarelo"> 
							  <span class="radio_button"></span>
							<input type=radio name="health_status" value="Laranja"> 
							  <span class="radio_button"></span>
							<input type=radio name="health_status" value="Vermelho"> 
							  <span class="radio_button"></span>
						</div>
					</div>
					
					<div class="notes">
						<label> Anotações </label>
						<textarea name="notes" rows="5" columns="40" placeholder="Está crescendo, uma belezura!"></textarea>
					</div>
					
					<div class="form_operations">
						<button type="submit"> Salvar </button>
						<button type="reset"> Limpar campos </button>
					</div>
				</form>
			</div>
			<br>
			
			<main>
				<table border="1" cellpadding="4" class="garden_plants_list">
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
							$remove_icon = "<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"48\" viewBox=\"0 96 960 960\" width=\"48\"><path d=\"M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z\"/></svg>";
							$update_icon = "<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"48\" viewBox=\"0 96 960 960\" width=\"48\"><path d=\"M180 876h44l443-443-44-44-443 443v44Zm614-486L666 262l42-42q17-17 42-17t42 17l44 44q17 17 17 42t-17 42l-42 42Zm-42 42L248 936H120V808l504-504 128 128Zm-107-21-22-22 44 44-22-22Z\"/></svg>";

							$health_status_color = 'green';
							while($data = mysqli_fetch_assoc($plants_list)) {
								switch ($data["health_status"]) {
									case 'Verde':
										$health_status_color = '#43AA8B';
										break;
									case 'Amarelo':
										$health_status_color = '#F9C74F';
										break;
									case 'Laranja':
										$health_status_color = '#F9844A';
										break;
									case 'Vermelho':
										$health_status_color = '#F94144';
										break;
								}

								echo "
									<tr>
										<td>" . $data["name"] ."</td>
										<td align='center'>" . $data["planted_on"] . "</td>
										<td bgcolor='" . $health_status_color . "'>" . $data["health_status"] . "</td>
										<td> 
											<button type=button class='remove_button' value='" . $data["id"] . "'><!--<img src='images/remove.svg'>--> " . $remove_icon . " </button>
											<a href='./components/update_plant_form/update_plant_form.php?id=" . $data["id"] . "'><button type=\"button\" class=\"edit_button\"> " . $update_icon . " </button></a>
										</td>	
									</tr>
								";
							}
						?>
					</tbody>
				</table>
			</main>
		</div>
		
	<?php
		/*
		if (isset($_GET["operation"])) { 
			$operation = $_GET["operation"];
			
			if ($operation === "remove") {
				include("./operations/remove_plant.php");
				// onclick remove(id);
			}
		}*/
		echo "<script type='text/javascript' src='js/operation_buttons_listeners.js'></script>"
	?>
	
	
	</body>
</html>