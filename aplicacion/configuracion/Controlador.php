<?php
	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	Class Controlador{
		//atributos (variables) => private, protected, public
		protected $controlador;

		//comportamientos (funciones)
		function __construct(){
			$this->controlador = @explode('/', $_SERVER['QUERY_STRING'])[1];
		}

		//cargar contenido
		function cargar(){
			$mi_controlador = $this->controlador;

			//tomar datos de la fecha con la API
			date_default_timezone_set('America/Bogota');

			//incluimos el archivo de funciones
			include('funciones.php');

			//validar si existe el archivo controlador
			if(is_file('aplicacion/controlador/'.$mi_controlador.'.php')){

				//incluimos el archivo controlador
				include('aplicacion/controlador/'.$mi_controlador.'.php');
				//instanciamos la clase
				$clase = New $mi_controlador();

				//validar si existe método index
				@$funcion = explode('/', $_SERVER['QUERY_STRING'])[2];
				if( !empty($funcion) ){
					if( method_exists($clase, $funcion) ){
						$clase->$funcion();
					}else{
						echo "<br/>No existe el método de la clase: ".$mi_controlador;
					}
				}else{
					$clase->index();
				}
			}else{
				// echo "404, pagina no encontrada...";
                include('aplicacion/controlador/PaginaPublica.php');
                $pagina = New PaginaPublica();

                if($pagina->existe()==true) {
                    $pagina->index();
                }else{
                    echo "404, página no encontrada";
                }
			}
		}
	}
?>