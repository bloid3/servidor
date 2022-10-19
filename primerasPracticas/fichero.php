<?php
define ("RUTA_ARCHIVO", "stock1.ser");
if (file_exists(RUTA_ARCHIVO)) {
	echo "El archivo existe, voy a leerlo";
	$file = fopen(RUTA_ARCHIVO, "r");
	while ($linea = fgets($file)) {
		$campos = explode(",",$linea);
		$stock[$campos[0]] = $campos[1];
	}
	foreach($stock as $fruta => $valor) {
		echo "<br>$fruta : $valor";
	}
} else {
	echo "El archivo no existe";
	$stock = array ("fresas" => 10,
					"platanos" => 20,
					"kiwis" => 5);
	$file = fopen(RUTA_ARCHIVO,"w");
	foreach($stock as $fruta => $valor) {
		fputs($file, $fruta . "," . $valor . "\n");
	}
}
?>