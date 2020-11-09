<?php
	//config
	function config($indice=null){
		$config = array();
		include('config.php');
		return (!empty($config[$indice])) ? $config[$indice] : false;
	}

	//cargar vista
	function cargar_vista($vista=null, $datos=null){
		(is_array($datos)) ? extract($datos) : null;
		return include('aplicacion/vista/'.$vista.'.php');
	}

	//redirigir url (ruta, mensajea mostrar, tipo[correcto, sugerencia, error])
	function redirigir($ruta, $mensaje=null, $tipo=null){
		$mensajeTipo = ($tipo != null) ? '?'.$tipo.'='.$mensaje :'';
		header('location:'.config('base_url').$ruta.$mensajeTipo);
	}

	//sesión para el administrador

	function sesionAdmin(){
		@session_start();
		return (isset($_SESSION['loginAdmin']) && !empty($_SESSION['loginAdmin'])) ? $_SESSION['loginAdmin'] : false;
	}
	//Cerrar sesion
	function cerrarSesionAdmin(){
		session_start();
		//session_destroy();
		unset($_SESSION['loginAdmin']);
		redirigir('Login');
	}

	//crear log
	function crearLog ($seccion, $tipo, $usuario){
		$directorio = config('root').'logs/';
		$nombreArchivo = $tipo.'-'.date('Y-m-d').'-'.$seccion.".txt";
		$hora = date('H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		//crear archivo
		/*
			r = lectura
			W = escribir(sobreescribir) si el archivo no existe lo crea
			a = escribir (actualizar)
		*/
		$archivo = fopen($directorio.$nombreArchivo,'a');
		$info = $hora.'|'.$ip.'|'.$usuario.'|'.$tipo."\r\n";
		fwrite($archivo, $info);

		//cerrar archivo
		fclose($archivo);
	}
		//slug (crear texto amigable óptimo para la letura para la url)
	function slug($texto){
		$texto = strip_tags($texto);
		$texto = mb_strtolower($texto);//pasar a minúscula
		$texto = trim($texto); //quita espacios
		$texto = str_replace('á', 'a',$texto);
		$texto = str_replace('é', 'e',$texto);
		$texto = str_replace('í', 'i',$texto);
		$texto = str_replace('ó', 'o',$texto);
		$texto = str_replace('ú', 'u',$texto);
		$texto = str_replace('ñ', 'n',$texto);
		$texto = str_replace(' ', '-',$texto);
		return $texto;
	}

		//subir archivos
	function subirArchivo($archivo){
		$destino = config('root').'archivos/';
		$nombre = date('Y-m-d-H-i-s-').$archivo['name'];

		if(move_uploaded_file($archivo['tmp_name'], $destino.$nombre)){ //nombre del archivo temporal
			return $nombre;
		}else{
			return null;
		}
	}

	//eliminar archivo

	function eliminarArchivo($nombre){
		$directorio = config('root').'archivos/';
		if (unlink($directorio.$nombre)) {
			return true;
		}else{
			return false;
		}
	}

	

?>