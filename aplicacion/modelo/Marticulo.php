<?php
//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}
Class Marticulo{
		protected $db;
		function __construct(){
			require_once('aplicacion/configuracion/db.php');
			$this->db=$db;
		}

	function listarArticulos(){

		$sql = $this->db->query("
				SELECT 
					ar.aid,
					ar.titulo,
					ar.descripcion,
					ar.foto,
					ar.fecha,
					ar.estado,
					a.nombre AS 'administrador',
					(SELECT avg(calificacion) FROM puntuacion WHERE aid =ar.aid) AS 'puntos'
				FROM articulo ar
				INNER JOIN administrador a ON a.adid = ar.adid
				ORDER BY ar.aid ASC
			");
		$resultado = stmt($sql);
		return ($resultado->count() > 0) ? $resultado : false;
	}

	function crearArticulo($articulo){
		$sql = " 
				INSERT INTO articulo VALUES(
		            null,
		            '".$articulo["titulo"]."',
		            '".$articulo["descripcion"]."',
		            '".$articulo["foto"]."',
		            '".$articulo["fecha"]."',
		            '".$articulo["estado"]."',
		            '".$articulo["adid"]."',
		            '".$articulo["slug"]."'
		        );
			";
		$stmt = $this->db->prepare($sql);
		return($stmt->execute()) ? true : false;
	}

	function fotoArticulo($aid){
			$sql = $this->db->query("SELECT foto FROM articulo WHERE aid='".$aid."';");
			$resultado = stmt ($sql);
			return ($resultado->count() > 0) ? $resultado[0]->foto : false;
	}

	function eliminarArticulo($aid){
			$sql = "DELETE FROM articulo WHERE aid='".$aid."';";
			$stmt = $this->db->prepare($sql);
			return ($stmt->execute()) ? true : false;

	}

	function editarArticulo($articulo){
			$sql = " 
				UPDATE articulo SET
		            titulo 	= '".$articulo["titulo"]."',
		            descripcion = '".$articulo["descripcion"]."',
		            foto = '".$articulo["foto"]."',
		            fecha = '".$articulo["fecha"]."',
		            estado = '".$articulo["estado"]."',
		            adid = '".$articulo["adid"]."',
		            slug = '".$articulo["slug"]."'
		            WHERE 
		            aid = '".$articulo["aid"]."'
		        ;
			";
			$stmt = $this->db->prepare($sql);
			return ( $stmt->execute() ) ? true : false;
	}

	function articuloPorAid($aid){
			$sql = $this->db->query("SELECT * FROM articulo WHERE aid='".$aid."';");
			$resultado = stmt ($sql);
			return ($resultado->count() > 0) ? $resultado[0] : false;
	}

	function eliminarFoto($aid){
			$sql = "UPDATE articulo SET foto='' WHERE aid='".$aid."';";
			$stmt = $this->db->prepare($sql);
			return ( $stmt->execute() ) ? true : false;
		}

}
?>