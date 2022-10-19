<!DOCTYPE html>
<?php
	session_start();
	if ($_SESSION["user"]  != "pablo" || $_SESSION["pass"] != "12345")
		header("Location: http://www.pabloweb.com/workspace/servidor/loginsesion.php");
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ActualizacionDatos</title>
</head>
<body>
	<h1>USUARIO</h1>
	

		<?php
			$nombre = "";
			$apellido1 = "";
			$apellido2 = "";
			$edad = "";

			if (!array_key_exists("nombre", $_POST) && !array_key_exists("apellido1", $_POST) && !array_key_exists("apellido2", $_POST) 
			&& !array_key_exists("edad", $_POST)) {
				echo "<form action=actualizaciondatos.php method=post>INTRODUZCA SUS DATOS<br>";
				echo "Nombre:    <input type=text name=nombre required><br>";
				echo "Apellido1: <input type=text name=apellido1 required><br>";
				echo "Apellido2: <input type=text name=apellido2 required><br>";
				echo "Edad:      <input type=number name=edad required><br>";
				echo "<input type=submit value=Enviar>";
			} else {
				
				if (array_key_exists("ant_nombre", $_POST)) {
					$nombre = $_POST["ant_nombre"];
					echo "<input type=hidden name=ant_nombre value=" . $nombre . ">";
				}
				if (array_key_exists("ant_apellido1", $_POST)) {
					$apellido1 = $_POST["ant_apellido1"];
					echo "<input type=hidden name=ant_apellido1 value=" . $apellido1 . ">";
				}
				if (array_key_exists("ant_apellido2", $_POST)) {
					$apellido2 = $_POST["ant_apellido2"];
					echo "<input type=hidden name=ant_apellido2 value=" . $apellido2 . ">";
				}
				if (array_key_exists("ant_edad", $_POST)) {
					$edad = intval($_POST["ant_edad"]);
					echo "<input type=hidden name=ant_edad value=" . $edad . ">";
				}
				if (array_key_exists("nombre", $_POST) && !array_key_exists("ant_nombre", $_POST)) {
					echo "<input type=hidden name=ant_nombre value=" . $_POST["nombre"] . ">";
					$nombre = $_POST["nombre"];
				}
				if (array_key_exists("apellido1", $_POST) && !array_key_exists("ant_apellido1", $_POST)) {
					echo "<input type=hidden name=ant_apellido1 value=" . $_POST["apellido1"] . ">";
					$apellido1 = $_POST["apellido1"];
				}
				if (array_key_exists("apellido2", $_POST) && !array_key_exists("ant_apellido2", $_POST)) {
					echo "<input type=hidden name=ant_apellido2 value=" . $_POST["apellido2"] . ">";
					$apellido2 = $_POST["apellido2"];
				}
				if (array_key_exists("edad", $_POST) && !array_key_exists("ant_edad", $_POST)) {
					echo "<input type=hidden name=ant_edad value=" . $_POST["edad"] . ">";
					$edad = intval($_POST["edad"]);
				}
				echo "<form action=actualizaciondatos.php method=post>INTRODUZCA SUS DATOS<br>";
				echo "Nombre:    <input type=text name=nombre required value=$nombre><br>";
				echo "Apellido1: <input type=text name=apellido1 value=$apellido1 required><br>";
				echo "Apellido2: <input type=text name=apellido2 value=$apellido2 required><br>";
				echo "Edad:      <input type=number name=edad value=$edad required><br>";
				echo "<input type=submit value=Actualizar>";
			}
		?>
	</form>
</body>
</html>