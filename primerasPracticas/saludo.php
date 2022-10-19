<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prueba php</title>
</head>
<body>
	<form action="saludo.php">
	<p>Nombre: <input type="text" name="nombre"></p>
	</form>
	<?php
	if (!array_key_exists("nombre", $_REQUEST) || $_REQUEST["nombre"] == "")
		echo "Hola Mundo";
	else 
		echo "Hola $_REQUEST[nombre]";
	?>
</body>
</html>