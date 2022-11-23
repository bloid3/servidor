<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		if (!array_key_exists("user", $_POST)) {
			$_POST["user"] = "";
			$_POST["pass"] = "";
		}
	?>
	<form action="loginsesion.php" method="post">
		USER: <input type="text" name="user" required> <br>
		PASS: <input type="pass" name="pass" required> <br>
		<input type="submit" value="Enviar">
	</form>
	<?php
		if ($_POST["user"] == "pablo" && $_POST["pass"] == "12345") {
			$_SESSION["user"] = $_POST["user"];
			$_SESSION["pass"] = $_POST["pass"];
			echo "ACCESO CORRECTO <br> ¿Donde desea ir?";
		}
	?>
</body>
</html>