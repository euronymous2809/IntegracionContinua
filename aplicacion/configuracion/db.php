<?php
	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	//PDO
	$host = 'localhost';
	$nombre_bd = 'micms';
	$usuario = 'root';
	$clave = 'toor';

	//instanciar Pdo
	$db = New PDO('mysql:host='.$host.'; dbname='.$nombre_bd.'; ', $usuario, $clave);
	$db->exec('SET CHARACTER SET utf8');

	//STMT, transacciones con la bd
	function stmt($consulta){
		$resultado = '';
		if(!empty($consulta)){
			$resultado = New ArrayObject($consulta->fetchAll(PDO::FETCH_CLASS, 'stdClass'));
		}
		return $resultado;
	}

	//llave de encriptación
	function llave(){
		return 'M1Cm520**-!';
	}
?>