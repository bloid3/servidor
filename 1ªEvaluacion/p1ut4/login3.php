<?php
	$dominio = 'PabloWeb';
	$usuarios = array('pablo' => '12345', 'invitado' => 'invitado');
	
	if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Digest realm="'.$dominio.'",qop="auth",nonce="'.uniqid().'",opaque="'.md5($dominio).'"');
		die('CANCELADO');
	}
	
	if (!($datos = analizar_http_digest($_SERVER['PHP_AUTH_DIGEST'])) || !isset($usuarios[$datos['username']]))
		die('CANCELADO');
	
	$A1 = md5($datos['username'] . ':' . $dominio . ':' . $usuarios[$datos['username']]);
	$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$datos['uri']);
	$respuesta_valida = md5($A1.':'.$datos['nonce'].':'.$datos['nc'].':'.$datos['cnonce'].':'.$datos['qop'].':'.$A2);
	
	if ($datos['response'] != $respuesta_valida)
		die('CANCELADO');
	
		echo 'AUTORIZADO';

	function analizar_http_digest($txt) {
		$datos = array();
		$claves = implode('|', array('nonce', 'nc', 'cnonce', 'qop', 'username', 'uri', 'response'));
		preg_match_all('@('.$claves.')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $coincidencias, PREG_SET_ORDER);
		foreach ($coincidencias as $c) {
			$datos[$c[1]] = $c[3] ? $c[3] : $c[4];
			unset($c);
		}
		return $datos;
	}
?>