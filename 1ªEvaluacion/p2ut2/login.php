<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<?php
		if (!array_key_exists("user", $_POST)) {
			$_POST["user"] = "";
			$_POST["pass"] = "";
		}
	?>
	<form method="post" action="login.php">
		Usuario: <input type="text" name="user" required>
		<br>
		Pass: <input type="password" name="pass" required>
		<br>
		<input type="submit" name="enviar">
	</form>
	<?php
		if ($_POST["user"] == "pablo" && $_POST["pass"] == "12345") {
			$_SESSION["user"] = $_POST["user"];
			$_SESSION["pass"] = $_POST["pass"];
			echo "CREDENCIALES CORRECTOS";
			echo "<br>";
			echo "¿A qué página desea ir?";
			echo "<br>";
			echo "<a href=http://www.pabloweb.com/workspace/servidor/p2ut2/viewstock.php>Visualización de stock</a>";
			echo "<br>";
			echo "<a href=http://www.pabloweb.com/workspace/servidor/p2ut2/modStock.php>Modificación de stock</a><br>";
			echo "<a href=http://www.pabloweb.com/workspace/servidor/p2ut2/carritoStock.php>Pedidos</a>";
		}
	?>
</body>
</html>