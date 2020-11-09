<?php
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	class Visitante extends Controlador{
		protected $visitante = array();

		function __construct(){
			if(sesionAdmin() == false){
				redirigir('login');
			}

			include('aplicacion/modelo/Mvisitante.php');

			$this->visitante = New Mvisitante();
		} 



		function index (){
			$datos = array(
				'titulo' 	 => '	Listado Visitantes',
				'clase'  	 => __CLASS__,
				'visitantes' => $this->visitante->listarVisitantes()
			);
		
			cargar_vista('admin/vista_cabecera',$datos);
			cargar_vista('admin/vista_visitante',$datos);
			cargar_vista('admin/vista_final');

		}

	}




?>