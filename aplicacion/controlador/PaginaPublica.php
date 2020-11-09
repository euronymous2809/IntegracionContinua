 <?php
	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	Class PaginaPublica extends Controlador{
		//atributos
		protected $pagina = array();
		protected $menu = array();

		//comportamientos
		function __construct(){
			$slug = explode('/', $_SERVER['QUERY_STRING']);
			$slug = @$slug[1];

			//incluir módelo
			include('aplicacion/modelo/Mpagina.php');

			//instanciar el  módelo
			$this->pagina = New Mpagina();
			//menu
			$this->menu = $this->pagina->menu();
			//paginas
			$this->pagina = $this->pagina->paginaPorSlug($slug);
		}

		function existe(){
			return $this->pagina;
		}

		function index(){
		//datos para pasar a las vistas
			$datos = array(
				'titulo' => 'Mi cmc | '.$this->pagina->titulo,
				'clase'  => __CLASS__,
				'pagina' => $this->pagina,
				'menu'   => $this->menu

			);
			//cargar vistas
			cargar_vista('publico/vista_cabecera',$datos);
			cargar_vista('publico/vista_pagina',$datos);
		}


	}


?>