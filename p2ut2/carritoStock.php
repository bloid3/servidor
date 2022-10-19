<?php
	session_start();
	echo "CARRITO";
	$pdo = new PDO("mysql:dbname=discos;host=localhost","pablito","12345");
	if (!isset($_SESSION["totalP"])) {
		$_SESSION["totalP"] = 0;
	}
	echo "<form action=carritoStock.php method=post>";
	echo "<table border=1px solid black style=border-collapse:collapse>";
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
			echo "$registro[stock]";
			echo "</td>";
			echo "<td>";
			echo "$registro[precio] €";
			echo "</td>";
			echo "<td>";
			echo "<input type=number value=0 name='n_" . $registro["id"] . "' max=" . $stock . ">";
			echo "</td>";
			echo "</tr>";
			if ($_POST["n_" . $registro["id"]] != 0) {
				$_SESSION["totalP"] += $registro["precio"] * intval($_POST["n_" . $registro["id"]]);
				$data =['stock' => $registro["stock"] - intval($_POST["n_" . $registro["id"]])];
				$sql = "UPDATE discos SET stock=:stock where id=" . $registro["id"];
				$stmt = $pdo->prepare($sql);
				$stmt->execute($data);
			}
		}
	}
	echo "</table>";
	echo "<input type=submit value=Añadir name=añadir>";
	if (isset($_POST["añadir"])) {
		echo "El precio total es: " . $_SESSION["totalP"] . " €";		
	}
	echo "</form>";
?>