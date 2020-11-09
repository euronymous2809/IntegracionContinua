<?php
if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	class SalirAdmin extends Controlador{
	

	function index(){
		echo "salir de la sesión";
		cerrarSesionAdmin();
	}


}


?>