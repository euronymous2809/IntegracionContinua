<?php
	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	Class Comentario extends Controlador{
		//atributos
		protected $comentario = array();

		//comportamientos
		function __construct(){
			//Validar sesión del administrador
			

			//validar sesión del administrador
			if (sesionAdmin()==false){
			redirigir('login');
		}
			//incluir el archivo del modelo
			include('aplicacion/modelo/Mcomentario.php');
			//instanaciar el modelo
			$this->comentario = New Mcomentario();
		}

		//método index por defecto de cada controlador
		function index(){

			$datos = array(
			'titulo' 		=> 'Listado de comentarios',
			'clase' 		=> __CLASS__,
			'comentarios'	=> $this->comentario->listarComentarios()
		);

			cargar_vista('admin/vista_cabecera');
			cargar_vista('admin/vista_comentario', $datos);
			cargar_vista('admin/vista_final');
		}
	}
?>