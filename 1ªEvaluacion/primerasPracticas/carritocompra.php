<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CarritoCompra</title>
</head>
<body>
	<form action="carritocompra.php" method="post">
		Manzanas: 
		<input type="number" name="nmanzanas"> <br>
		Platanos: 
		<input type="number" name="nplatanos"> <br>
		Peras: 
		<input type="number" name="nperas"> <br>
		<input type="submit" value="Actualizar"> <br>
		<?php
			$numman = 0;
			$numpla = 0;
			$numper = 0;
			
			if ((!array_key_exists("nmanzanas", $_POST) && !array_key_exists("nplatanos", $_POST) && !array_key_exists("nperas", $_POST))) {
				echo "No hay productos en su cesta";
				echo "<br>";
			} else {
				if (array_key_exists("ant_manz", $_POST)) {
					$numman = intval($_POST["ant_manz"]) + intval($_POST["nmanzanas"]);
					echo "<input type=hidden name=ant_manz value=" . $numman . ">";
				}
				if (array_key_exists("ant_pla", $_POST)) {
					$numpla = intval($_POST["ant_pla"]) + intval($_POST["nplatanos"]);
					echo "<input type=hidden name=ant_pla value=" . $numpla . ">";
				}
				if (array_key_exists("ant_per", $_POST)) {
					$numper = intval($_POST["ant_per"]) + intval($_POST["nperas"]);
					echo "<input type=hidden name=ant_per value=" . $numper . ">";
				}
				if (array_key_exists("nmanzanas", $_POST) && !array_key_exists("ant_manz", $_POST)){
					echo "<input type=hidden name=ant_manz value=" . $_POST["nmanzanas"] . ">";
					$numman = intval($_POST["nmanzanas"]);
				}
				if (array_key_exists("nplatanos", $_POST) && !array_key_exists("ant_pla", $_POST)){
					echo "<input type=hidden name=ant_pla value=" . $_POST["nplatanos"] . ">";
					$numpla = intval($_POST["nplatanos"]);
				}
				if (array_key_exists("nperas", $_POST) && !array_key_exists("ant_per", $_POST)){
					echo "<input type=hidden name=ant_per value=" . $_POST["nperas"] . ">";
					$numper = intval($_POST["nperas"]);
				}
				if ($numman == 0 && $numpla == 0 && $numper == 0) {
					echo "No hay productos en su cesta";
					echo "<br>";
				} else {
					echo "CESTA DE LA COMPRA<br>";
					echo "Manzanas: $numman <br>";
					echo "Platanos: $numpla <br>";
					echo "Peras: $numper <br>";
				}
			}
		?>
	</form>
</body>
</html>