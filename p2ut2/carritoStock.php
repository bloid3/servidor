<?php
	session_start();
	echo "CARRITO";
	$pdo = new PDO("mysql:dbname=discos;host=localhost","pablito","12345");
	echo "<form action=carritoStock.php method=post>";
	if (!isset($_SESSION["totalP"])) {
		$_SESSION["totalP"] = 0;
	}
	if (!isset($_POST["n_1"])) {
		$_POST["n_1"] = 0;
		$_POST["n_2"] = 0;
		$_POST["n_3"] = 0;
		$_POST["n_4"] = 0;
		$_POST["n_5"] = 0;
		$_POST["n_6"] = 0;
		$_POST["n_7"] = 0;
		$_POST["n_8"] = 0;
		$_POST["n_9"] = 0;
	}
	if (isset($_POST["añadir"])) {
		if ($consulta = $pdo->query("SELECT * from discos")) {
			while ($registro = $consulta->fetch()) {
				if ($_POST["n_" . $registro["id"]] != 0) {
					$_SESSION["totalP"] += $registro["precio"] * intval($_POST["n_" . $registro["id"]]);
					$_SESSION["nPedido_" . $registro["id"]] = intval($_POST["n_" . $registro["id"]]);
					$data =['stock' => $registro["stock"] - $_SESSION["nPedido_" . $registro["id"]]];
					$sql = "UPDATE discos SET stock=:stock where id=" . $registro["id"];
					$stmt = $pdo->prepare($sql);
					$stmt->execute($data);
				}
			}
			echo "El precio de la cesta es: " . $_SESSION["totalP"] . " €";
			echo "<input type=submit name=vaciar value=VaciarCesta>";
		}
		if (isset($_POST["vaciar"])) {
			$_SESSION["totalP"] = 0;
			if ($consulta = $pdo->query("SELECT * from discos")) {
				while ($registro = $consulta->fetch()) {
					if ($_POST["n_" . $registro["id"]]) {
						$data =['stock' => $registro["stock"] + $_SESSION["nPedido_" . $registro["id"]]];
						echo $data;
						$sql = "UPDATE discos SET stock=:stock where id=" . $registro["id"];
						$stmt = $pdo->prepare($sql);
						$stmt->execute($data);
					}
				}
			}
		}
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
			echo "<input type=number name='n_" . $registro["id"] . "' max=" . $stock . ">";
			echo "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<input type=submit value=Añadir name=añadir>";
	echo "</form>";
?>