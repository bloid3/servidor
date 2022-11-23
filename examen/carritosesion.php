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
	<form action="carritosesion.php" method="post"s>
		Manzanas:
		<input type="number" name="nmanzanas" value=0> <br>
		<input type="submit" value="Añadir"> <br>

		<?php 
			if (isset($_SESSION["nmanzanas"]) && !array_key_exists("nmanzanas", $_POST)) {
				$manzanas = 0;
				$_POST["nmanzanas"] = "";
			} else {
				$manzanas = $_POST["nmanzanas"] + $_SESSION["nmanzanas"];
			}
			echo "Manzanas: $manzanas";
			echo "<br>";
			$_SESSION["nmanzanas"] = $manzanas;
		?>
	</form>
</body>
</html>