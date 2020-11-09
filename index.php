<?php
	//mostrar errores
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	//incluir la clase del controlador principal
	include('aplicacion/configuracion/Controlador.php');

	//instanciar clase controlador
	$controlador = New Controlador();

	//cargar contenido
	$controlador->cargar();
?>