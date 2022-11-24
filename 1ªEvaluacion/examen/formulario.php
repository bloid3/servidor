<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="formulario.php" method="post">
		<?php
			if (!array_key_exists("nombre", $_POST)) {
				$nombre = "";
				$apellido = "";
				echo "<input type=text name=nombre value=" . $nombre . "> <br>";
				echo "<input type=text name=apellido value=" . $apellido . "> <br>";
			} else {
				$nombre = $_POST["nombre"];
				$apellido = $_POST["apellido"];
				echo "<input type=text name=nombre value=" . $nombre . "> <br>";
				echo "<input type=text name=apellido value=" . $apellido . "> <br>";
			}
		?>
		<input type="submit" value="Actualizar">
	</form>
</body>
</html>