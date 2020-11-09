<?php
//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}
Class Mcomentario{
		protected $db;
		function __construct(){
			require_once('aplicacion/configuracion/db.php');
			$this->db=$db;
		}

	function listarComentarios(){

		$sql = $this->db->query("
				SELECT 
					c.cid,
					c.comentario,
					c.fecha,
					c.estado,
					v.nombre AS 'visitante'
				FROM comentario c
				INNER JOIN visitante v ON v.vid = c.vid
				ORDER BY c.cid ASC
			");
		$resultado = stmt($sql);
		return ($resultado->count() > 0) ? $resultado : false;
	}
}
?>