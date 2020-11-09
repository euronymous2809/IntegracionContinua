<?php
	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	Class Madministrador{
		protected $db;
		function __construct(){
			require_once('aplicacion/configuracion/db.php');
			$this->db=$db;
		}

		//validar si existe el administrador
		function validarAdmin($credencial){
			$sql = $this->db->query("
					SELECT 
						adid,
						nombre,
						email,
						estado
					FROM administrador
					WHERE 
						email = '".$credencial['email']."' AND 
						clave = aes_encrypt('".$credencial['clave']."', '".llave()."') AND
						estado = 1
			");
			$resultado = stmt($sql);
			return ( $resultado->count() > 0 ) ? $resultado[0] : false;
		}

		//crear administrador
		function crearAdmin(){

		}
	}
?>