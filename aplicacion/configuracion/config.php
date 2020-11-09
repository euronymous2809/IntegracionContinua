<?php
	/*
		Mi Cms
		variables de configuración para el proyecto
		Creación: 25-04-2020
	*/

	//validar el accesso a través de la url
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	//base url
	$config['base_url'] = mb_strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]).'://'.$_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['PHP_SELF']);

	// base path
	$config['root'] = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']);
?>