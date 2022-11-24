<?php
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="Contenido restringido"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'CANCELADO';
		exit;
	} else {
		echo "<p>Hola {$_SERVER['PHP_AUTH_USER']}.</p>";
		echo "<p>Has introducido {$_SERVER['PHP_AUTH_PW']} como tu contraseña.</p>";
	}
?>