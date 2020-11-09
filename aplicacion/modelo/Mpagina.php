<?php
	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	Class Mpagina{
		protected $db;
		function __construct(){
			require_once('aplicacion/configuracion/db.php');
			$this->db=$db;
		}

		function listarPaginas(){

			$sql = $this->db->query("
					SELECT 
						p.pid,
						p.titulo,
						p.foto,
						p.texto,
						p.video,
						p.estado,
						a.nombre AS 'administrador'
					FROM pagina p
					INNER JOIN administrador a ON a.adid = p.adid
					ORDER BY p.pid ASC
				");
			$resultado = stmt($sql);
			return ($resultado->count() > 0) ? $resultado : false;
		}
	//insertar página nueva
		function crearPagina($pagina){
			$sql = " 
					INSERT INTO pagina VALUES(
			            null,
			            '".$pagina["titulo"]."',
			            '".$pagina["foto"]."',
			            '".$pagina["texto"]."',
			            '".$pagina["video"]."',
			            '".$pagina["estado"]."',
			            '".$pagina["adid"]."',
			            '".$pagina["slug"]."'
			        );
				";
			$stmt = $this->db->prepare($sql);
			return($stmt->execute()) ? true : false;
		}

		function editarPagina($pagina){
			$sql = " 
				UPDATE pagina SET
		            titulo = '".$pagina["titulo"]."',
		            foto = '".$pagina["foto"]."',
		            texto = '".$pagina["texto"]."',
		            video = '".$pagina["video"]."',
		            estado = '".$pagina["estado"]."',
		            adid = '".$pagina["adid"]."',
		            slug = '".$pagina["slug"]."'
		            WHERE 
		            pid = '".$pagina["pid"]."'
		        ;
			";
			$stmt = $this->db->prepare($sql);
			return ( $stmt->execute() ) ? true : false;
		}

		//consultar si la pagina tiene fotos
		function fotoPagina($pid){
				$sql = $this->db->query("SELECT foto FROM pagina WHERE pid='".$pid."';");
				$resultado = stmt ($sql);
				return ($resultado->count() > 0) ? $resultado[0]->foto : false;
		}

		//eliminar pagina
		function eliminarPagina($pid){
			$sql = "DELETE FROM pagina WHERE pid='".$pid."';";
			$stmt = $this->db->prepare($sql);
			return ($stmt->execute()) ? true : false;

		}
		//función pagina por slug
		function paginaPorSlug($slug){
			$sql = $this->db->query("SELECT * FROM pagina WHERE slug='".$slug."' AND estado='1';");
			$resultado = stmt($sql);
			return($resultado->count() > 0) ? $resultado[0] : false;
		}
		//función menú
		function menu(){
			$sql = $this->db->query("SELECT pid, titulo, slug FROM pagina  WHERE estado='1';");
			$resultado = stmt($sql);
			return($resultado->count() > 0) ? $resultado : false;
		}

		function paginaPorPid($pid){
			$sql = $this->db->query("SELECT * FROM pagina WHERE pid='".$pid."';");
			$resultado = stmt($sql);
			return ( $resultado->count() > 0 ) ? $resultado[0] : false;
		}

		//eliminar foto
		function eliminarFoto($pid){
			$sql = "UPDATE pagina SET foto='' WHERE pid='".$pid."';";
			$stmt = $this->db->prepare($sql);
			return ( $stmt->execute() ) ? true : false;
		}

}
?>