<?php
	session_start();
	if ($_SESSION["user"]  != "pablo" || $_SESSION["pass"] != "12345")
		header("Location: http://www.pabloweb.com/workspace/servidor/p2ut2/login.php");
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
		try {
			$pdo -> beginTransaction();
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
			}
			$pdo -> commit();
		} catch(Exception $e) {
			$pdo -> rollback();
			echo "Error al añadir: " . $e;
		}
	}
	if (isset($_POST["vaciar"])) {
		$_SESSION["totalP"] = 0;
		if ($consulta = $pdo->query("SELECT * from discos")) {
			while ($registro = $consulta->fetch()) {
				$data =['stock' => $registro["stock"] + $_SESSION["nPedido_" . $registro["id"]]];
				$sql = "UPDATE discos SET stock=:stock where id=" . $registro["id"];
				$stmt = $pdo->prepare($sql);
				$stmt->execute($data);
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
			echo "<input type=number name='n_" . $registro["id"] . "' min=0 max=" . $stock . ">";
			echo "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<input type=submit value=Añadir name=añadir><br>";
	if (isset($_POST["añadir"])) {
		echo "El precio de la cesta es: " . $_SESSION["totalP"] . " € <br>";
		echo "<input type=submit name='vaciar' value=VaciarCesta><br>";
		echo "¿Desea confirmar pedido?<br>";
		echo "<input type=submit value='Confirmar pedido' name='confirmarP'>";
	}
	if (isset($_POST["confirmarP"])) {
		echo "PEDIDO CONFIRMADO, MUCHAS GRACIAS :D";
	}
	echo "</form>";
?>