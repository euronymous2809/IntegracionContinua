<?php
	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	Class Login extends Controlador{
		//atributos
		protected $admin = array();

		//comportamientos
		function __construct(){
			//validar sesión del administrador
			if (sesionAdmin()==true){
			redirigir('pagina');
		}
			//incluir el archivo del modelo
			include('aplicacion/modelo/Madministrador.php');
			//instanaciar el modelo
			$this->admin = New Madministrador();
		}

		//método index por defecto de cada controlador
		function index(){
			//datos para pasar a las vistas
			$datos = array(
				'titulo' => 'Inicio se sesión',
				'clase'  => __CLASS__
			);

			//echo config('base_url')."<br/>";
			//echo config('root');

			//cargar vistas
			cargar_vista('admin/vista_cabecera', $datos);
			cargar_vista('admin/vista_login');
			cargar_vista('admin/vista_final');
		}

		//método para procesar las credenciales capturadas
		function validar(){
			//capturamos los datos del formulario
			$datos = array();
			if(!empty($_POST)){
				$datos = [
					'email' => $_POST['email'],
					'clave' => $_POST['clave']
				];
			}
			
			//se valida que existan datos del formulario
			if( !empty($datos) ){
				$consulta = $this->admin->validarAdmin($datos);
				if($consulta==true){
					//print_r($consulta);
				//crear la sesión de administrador
					session_start();
					$_SESSION['loginAdmin'] = $consulta;

					redirigir('pagina');
				}else{
					//registrar log
					crearLog(__CLASS__,'validacion-login',$datos['email']);

					redirigir('login', '!Las credenciales no son válidas', 'error');
				}
			}else{
				redirigir('login', '!Por favor ingrese los datos', 'sugerencia');
			}
		}

		function hola(){
			echo "<br/>Hola, el metodo se esta ejecutando...";
		}
	}
?>