<?php

	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	Class Mvisitante{
		protected $db;
		function __construct(){
			require_once('aplicacion/configuracion/db.php');
			$this->db = $db;
		}

		function listarVisitantes(){
			$sql = $this->db->query("
				SELECT 
					v.vid,
					v.nombre,
					v.email,
					v.telefono,
					v.estado
				FROM visitante v
				ORDER BY v.vid ASC
				");
			$resultado = stmt($sql);
			return ($resultado->count() > 0) ? $resultado : false;

		}

	}

?>