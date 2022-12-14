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
	$i = 0;
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
			$i++;
		}
	}
	echo "</table>";
	echo "<input type=submit value=Actualizar name=actualizar>";
	echo "</form>";
	echo "¿Desea añadir o quitar algún producto?<br>";
	echo "<form action=modStock.php method=post><br>";
	echo "<input type=submit name=anadir value=Añadir>";
	echo "<input type=submit name=quitar value=Quitar>";
	if (isset($_POST["anadir"])) {
		echo <<< FIN
		<br>
		Nombre: <input type="text" name="nombre"><br>
		Autor: <input type="text" name="autor"><br>
		Genero: <input type="text" name="genero"><br>
		Stock: <input type="number" min=0 name="stock"><br>
		Precio: <input type=number name=precio><br>
		<input type=submit name=confirmar value=Confirmar>
		FIN;
	}
	if (isset($_POST["confirmar"])) {
		try {
			$data = ['nombre' => $_POST["nombre"],'autor' => $_POST["autor"],'genero' => $_POST["genero"],'stock' => $_POST["stock"],'precio' => $precio = $_POST["precio"],'id' => $i+1];
			$sql = "INSERT into discos(nombre,autor,genero,stock,precio,id) values(:nombre,:autor,:genero,:stock,:precio,:id)";
			$stmt = $pdo->prepare($sql);
			$stmt -> execute($data);
			echo "INSERTADO CON EXITO";
		} catch(Exception $e) {
			echo "Error al añadir producto, causa: " . $e;
		}
	}
	if (isset($_POST["quitar"])) {
		echo "<br>INTRODUZCA EL NOMBRE DEL DISCO A BORRAR<br>";
		echo "<input type=text name=nombreB><br>";
		echo "<input type=submit name=borrarP value=Borrar><br>";
	}
	if (isset($_POST["borrarP"])) {
		try {
			$sql = "DELETE FROM discos WHERE nombre='" . $_POST["nombreB"] . "'";
			$stmt = $pdo -> prepare($sql);
			$stmt -> execute();
			echo "<br>BORRADO CON ÉXITO";
		} catch (Exception $e) {
			echo "Error al borrar producto, causa: " . $e;
		}
	}
	echo "</form>";
	
?>