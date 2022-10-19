
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="post" action="" name="control">
		<div class="form-element">
			<label>Usuario</label>
			<input type="text" name="username" required/>
		</div>
		<div>
			<label>Contraseña</label>
			<input type="password" name="password" required/>
		</div>
		<button type="submit" name="login" value="login">Entrar</button>
	</form>
	<?php
		$usuario = "pablo";
		$contrasena = 12345;
		if (!array_key_exists("username",$_REQUEST))
			echo "";
		else if ($_REQUEST["username"] == $usuario && $_REQUEST["password"] == $contrasena)
			echo "Sesión iniciada. Username: " . $_REQUEST["username"];
		else
			echo "Credenciales incorrectas. Vuelve a intentarlo.";
	?>
</body>
</html>