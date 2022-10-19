<?php
	session_start();
	if ($_SESSION["user"]  != "pablo" || $_SESSION["pass"] != "12345")
		header("Location: http://www.pabloweb.com/workspace/servidor/p2ut2/login.php");
	$pdo = new PDO("mysql:dbname=discos;host=localhost","pablito","12345");
	echo "<form action=modStock.php method=post>";
	echo "<table border=1px solid black style=border-collapse:collapse>";
	if (isset($_POST["actualizar"])) {
		if ($consulta = $pdo->query("SELECT * from discos")) {
			while ($registro = $consulta->fetch()) {
				if ($_POST[$registro["id"]] >= 0) { 
					$data =['stock' => $_POST[$registro["id"]]];
				} else {
					$data =['stock' => 0];
				}
				$sql = "UPDATE discos SET stock=:stock where id=" . $registro["id"];
				$stmt = $pdo->prepare($sql);
				$stmt->execute($data);
			}
			echo "Actualizado";
		}
	}
	if ($consulta = $pdo->query("SELECT * from discos")) {
		while ($registro = $consulta->fetch()) {
			$stock = $registro["stock"];
			echo "<tr>";
			echo "<td>";
			echo "$registro[id]";
			echo "</td>";
			echo "<td>";
			echo "$registro[nombre]";
			echo "</td>";
			echo "<td>";
			echo "$registro[autor]";
			echo "</td>";
			echo "<td>";
			echo "<input type=number name='" . $registro["id"] .  "' value='" . $stock . "'>";
			echo "</td>";
			echo "<td>";
			echo "$registro[precio] €";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<input type=submit value=Actualizar name=actualizar>";
	echo "</form>";
?>