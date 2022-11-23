<!DOCTYPE html>
<?php
	session_start();
	if ($_SESSION["user"]  != "pablo" || $_SESSION["pass"] != "12345")
		header("Location: http://www.pabloweb.com/workspace/servidor/primerasPracticas/loginsesion.php");
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="carritosesion.php" method="post">
			Manzanas: 
			<input type="number" name="nmanzanas" value=0> <br>
			Platanos: 
			<input type="number" name="nplatanos" value=0> <br>
			Peras: 
			<input type="number" name="nperas" value=0> <br>
			<input type="submit" value="Enviar"> <br>
			<?php
				if (isset($_SESSION["nmanzanas"]) && !array_key_exists("nmanzanas", $_POST)) {
					$manzanas = 0;
					$platanos = 0;
					$peras = 0;
				} else {
					$manzanas = $_POST['nmanzanas'] + $_SESSION["nmanzanas"];
					$platanos = $_POST['nplatanos'] + $_SESSION["nplatanos"];
					$peras = $_POST['nperas'] + $_SESSION["nperas"];
				}
				echo "Manzanas: $manzanas";
				echo "<br>";
				echo "Plátanos: $platanos";
				echo "<br>";
				echo "Peras: $peras";
				echo "<br>";
				$_SESSION['nmanzanas'] = $manzanas;
				$_SESSION['nplatanos'] = $platanos;
				$_SESSION['nperas'] = $peras;
			?>
	</form>
</body>
</html>