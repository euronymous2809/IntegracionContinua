<?php
	if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...######');
	}

	class Pagina extends Controlador{
		protected $pagina = array();

		function __construct(){
			if (sesionAdmin()==false){
				redirigir('login');
			}
			//incluir el modeo
			include('aplicacion/modelo/Mpagina.php');
			//instancia de página
			$this->pagina = New Mpagina();
	}

	

		function index(){	
			//print_r($this->pagina->listarPaginas());

			$datos = array(
				'titulo' 	=> 'Listado de páginas',
				'clase' 	=> __CLASS__,
				'paginas'	=> $this->pagina->listarPaginas()
			);

			cargar_vista('admin/vista_cabecera', $datos);
			cargar_vista('admin/vista_paginas', $datos);
			cargar_vista('admin/vista_final');
			
		}

		//crear página formulario
		function nueva(){
			$datos = [
				'titulo' => 'pagina nueva',
				'clase' => __CLASS__
			];

			cargar_vista('admin/vista_cabecera', $datos);
			cargar_vista('admin/vista_pagina_nueva', $datos);
			cargar_vista('admin/vista_final');
		}



	//crear registro con el modelo
		function crear(){
			//echo "<pre>";
			//print_r($_POST);
			//print_r($_FILES);
			//echo "</pre>";
			if( !empty($_POST) ){
				$datos = [
					'pid'	 => null,
					'titulo' => strip_tags(trim($_POST['titulo'])),
					'foto'   => subirArchivo($_FILES['foto']),
					'texto'  => strip_tags(trim($_POST['texto']),'<a><p><span><b><strong><br><hr><button><i><u>'),
					'video'  => strip_tags(trim($_POST['video'])),
					'estado' => ($_POST['estado']==1) ? strip_tags(trim($_POST['estado'])) : 0,
					'adid'	 => sesionAdmin()->adid,
					'slug'   => slug($_POST['titulo'])
				];
				$resultado = $this->pagina->crearPagina($datos);
				if($resultado == true){
					redirigir('pagina');
				}else{
					redirigir('pagina/nueva','No se puedo crear la página, intente nuevamente,','error');
				}
			}else{
				redirigir('pagina/nueva', 'Debe ingresar datos', 'sugerencia');
			}
		}

		function eliminar (){

			$pid= explode('/', $_SERVER['QUERY_STRING']);
			$pid = end($pid);
					
			if($pid > 0){
				$existeFoto = $this->pagina->fotoPagina($pid);
				$resultado = $this->pagina->eliminarPagina($pid);
				if ($resultado == true) {
					//Eliminar foto
					if($existeFoto==true){
						eliminarArchivo($existeFoto);
					}
					redirigir('pagina');
				}else{
					redirigir('pagina','No se puede eliminar la página, intente nuevamente','error');
				}
				
			}else{
				redirigir('pagina', 'No hay elementos que eliminar', 'sugerencia');
			}
			
		}

		function editar(){
			$pid = explode('/', $_SERVER['QUERY_STRING']);
			$pid = end($pid);

					$datos = [
					'titulo' => 'Editar Página '.$pid,
					'clase'  => __CLASS__,
					'pagina' =>  $this->pagina->paginaPorPid($pid)
				];

				//cargar vistas
				cargar_vista('admin/vista_cabecera', $datos);
				cargar_vista('admin/vista_pagina_editar', $datos);
				cargar_vista('admin/vista_final');
		}

		//eliminar foto de la página
		function eliminarFotoPagina(){
			$pid = explode('/', $_SERVER['QUERY_STRING']);
			$pid = end($pid);

			if( $pid > 0 ){
				$foto = $this->pagina->fotoPagina($pid);
				$resultado = $this->pagina->eliminarFoto($pid);
				if($resultado==true){
					eliminarArchivo($foto);
					redirigir('pagina/editar/'.$pid);
				}else{
					redirigir('pagina/editar/'.$pid, 'No se pudo eliminar la foto, intente nuevamente!', 'error');
				}
			}else{
				redirigir('pagina', 'No hay foto que eliminar', 'sugerencia');
			}
		}

		//actualizar registro con el modelo
		function actualizar(){
			$pid = explode('/', $_SERVER['QUERY_STRING']);
			$pid = end($pid);

			if( !empty($_POST) && $pid > 0 ){
				$existeFoto = $this->pagina->fotoPagina($pid);
				$datos = [
					'pid'	 => $pid,
					'titulo' => strip_tags(trim($_POST['titulo'])),
					'foto'   => ($existeFoto==false) ? subirArchivo($_FILES['foto']) : $existeFoto,
					'texto'  => strip_tags(trim($_POST['texto']),'<a><p><span><b><strong><br><hr><button><i><u>'),
					'video'  => strip_tags(trim($_POST['video'])),
					'estado' => ($_POST['estado']==1) ? strip_tags(trim($_POST['estado'])) : 0,
					'adid'	 => sesionAdmin()->adid,
					'slug'   => slug($_POST['titulo'])
				];

				$resultado = $this->pagina->editarPagina($datos);
				if($resultado == true){
					redirigir('pagina/editar/'.$pid);
				}else{
					redirigir('pagina/editar/'.$pid, 'No se pudo editar la página, intente nuevamente!', 'error');
				}
			}else{
				redirigir('pagina', 'Debe ingresar datos!', 'sugerencia');
			}
		}
		
	}
?>