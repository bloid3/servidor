<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		echo "<table text-align: center; border=3>";
		echo "<tr>";
		echo "<td bgcolor=#808dce>Múltiplo</td>";
		for ($tab = 1; $tab <= 10; $tab++)
		{
			echo "<td bgcolor=pink>Tabla del $tab</td>";
		}
		for ($i = 1; $i <= 10; $i++)
		{
			echo "<tr>";
			echo "<td bgcolor=pink>$i</td>";
			for ($j = 1; $j <= 10; $j++)
			{
				echo "<td bgcolor=beige>";
				echo ($i*$j);
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>