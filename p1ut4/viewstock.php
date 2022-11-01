<?php
	session_start();
	if ($_SESSION["user"]  != "pablo" || $_SESSION["pass"] != "12345")
		header("Location: http://www.pabloweb.com/workspace/servidor/p2ut2/login.php");
	$pdo = new PDO("mysql:dbname=discos;host=localhost","pablito","12345");
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
			echo "</tr>";
		}
	}
	echo "</table><br>";
?>