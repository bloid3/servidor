<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="hidden.php" method="post">
	Manzanas: 
	<input type="number" name="nmanzanas"> <br>
	<input type="submit" value="Añadir"> <br>
	<?php
		$nmanzanas = 0;

		if (!array_key_exists("nmanzanas", $_POST) && !array_key_exists("nplatanos", $_POST) && !array_key_exists("nnaranjas", $_POST)) {
			echo "No hay productos en su cesta";
			echo "<br>";
		} else {
			if (array_key_exists("ant_man", $_POST)) {
				$nmanzanas = intval($_POST["nmanzanas"]) + intval($_POST["ant_man"]);
				echo "<input type=hidden name=ant_man value=" . $nmanzanas . ">";
			}
			if (!array_key_exists("ant_man", $_POST) && array_key_exists("nmanzanas", $_POST)) {
				echo "<input type=hidden name=ant_man value=" . $_POST["nmanzanas"] . ">";
				$nmanzanas = $_POST["nmanzanas"];
			}

			if ($nmanzanas == 0) {
				echo "No hay productos en su cesta";
				echo "<br>";
			} else {
				echo "Hay " . $nmanzanas . " manzanas";
			}
		} 
	?>
	</form>
</body>
</html>