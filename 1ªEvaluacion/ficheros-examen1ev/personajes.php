<?php

 $personajes = [
		[ "id" => 1 , "nombre" => "Bob Esponja" ],
		[ "id" => 2 , "nombre" => "Patricio Estrella" ],
		[ "id" => 3 , "nombre" => "Calamardo Tentáculos" ],
		[ "id" => 4 , "nombre" => "Arenita Mejillas" ],
		[ "id" => 5 , "nombre" => "Don Cangrejo" ],
		[ "id" => 6 , "nombre" => "Plankton" ],
		[ "id" => 7 , "nombre" => "Perla Cangrejo" ],
		[ "id" => 8 , "nombre" => "Karen" ],
		[ "id" => 9 , "nombre" => "Sra. Puff" ],
		[ "id" => 10 , "nombre" => "Gary" ],
		];

 if (strtoupper($_SERVER["REQUEST_METHOD"]) != "GET") {
  header('HTTP/1.1 422 Unprocessable Entity');
  die();
 }


 $matches = array();
 if (preg_match("/(\d+)$/",$_SERVER['REQUEST_URI'],$matches)) {
  // Si el URI termina por un número, se lo asignamos a $id
  $id = $matches[0];
  
 }

 


?>
