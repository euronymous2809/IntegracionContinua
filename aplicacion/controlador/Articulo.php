<?php

if(strpos($_SERVER['REQUEST_URI'], '.php') !== false){
		exit('No está permitido el accesso al recurso...');
	}

	class Articulo extends Controlador{
		protected $articulo = array();

		function __construct(){
			//Validar sesión del administrador
			if (sesionAdmin()==false){
				redirigir('login');
			}
			//incluir el modeo
			include('aplicacion/modelo/Marticulo.php');
			//instancia de artículo
			$this->articulo = New Marticulo();
		}


		function index(){	
				//print_r($this->pagina->listarPaginas());

				$datos = array(
					'titulo' 	=> 'Listado de artículos',
					'clase' 	=> __CLASS__,
					'articulos'	=> $this->articulo->listarArticulos()
				);

				cargar_vista('admin/vista_cabecera', $datos);
				cargar_vista('admin/vista_articulo', $datos);
				cargar_vista('admin/vista_final');
				
		}

		function nuevo(){
			$datos = [
				'titulo' => 'Artículo nuevo',
				'clase' => __CLASS__
				
			];



			cargar_vista('admin/vista_cabecera', $datos);
			cargar_vista('admin/vista_articulo_nuevo', $datos);
			cargar_vista('admin/vista_final');
		}



	//crear registro con el modelo
		function crear(){
			//echo "<pre>";
			print_r($_POST);
			echo "hola";
			//print_r($_FILES);
			//echo "</pre>";
			if( !empty($_POST) ){
				$datos = [
					'aid'	 	  => null,
					'titulo' 	  => strip_tags(trim($_POST['titulo'])),
					'descripcion' => strip_tags(trim($_POST['descripcion']),'<a><p><span><b><strong><br><hr><button><i><u>'),
					'foto'   	  => subirArchivo($_FILES['foto']),
					'fecha'  	  => date('Y-m-d H:i:s'),
					'estado' 	  => ($_POST['estado']==1) ? strip_tags(trim($_POST['estado'])) : 0,
					'adid'	 	  => sesionAdmin()->adid,
					'slug'  	  => slug($_POST['titulo'])
				];
				$resultado = $this->articulo->crearArticulo($datos);
				if($resultado == true){
					redirigir('articulo');
				}else{
					//print_r(expression)
					redirigir('articulo/nuevo','No se pudo crear el artículo, intente nuevamente,','error');			}

			}else{
				redirigir('articulo/nuevo', 'Debe ingresar datos', 'sugerencia');
			}
		}

		function eliminar (){

			$aid= explode('/', $_SERVER['QUERY_STRING']);
			$aid = end($aid);
					
			if($aid > 0){
				$existeFoto = $this->articulo->fotoArticulo($aid);
				$resultado = $this->articulo->eliminarArticulo($aid);
				if ($resultado == true) {
					//Eliminar foto
					if($existeFoto==true){
						eliminarArchivo($existeFoto);
					}
					redirigir('articulo');
				}else{
					redirigir('articulo','No se puede eliminar el artículo, intente nuevamente','error');
				}
				
			}else{
				redirigir('articulo', 'No hay elementos que eliminar', 'sugerencia');
			}
			
		}

		function editar (){

			$aid= explode('/', $_SERVER['QUERY_STRING']);
			$aid = end($aid);
			
			$datos = [
				
				'titulo' 	 => 'Editar Artículo '.$aid,
				'clase' 	 => __CLASS__,
				'articulo'	 => $this->articulo->articuloPorAid($aid)
							
			];

			cargar_vista('admin/vista_cabecera', $datos);
			cargar_vista('admin/vista_articulo_editar', $datos);
			cargar_vista('admin/vista_final');
		}

		function actualizar(){

			$aid= explode('/', $_SERVER['QUERY_STRING']);
			$aid = end($aid);

			if(!empty($_POST) && $aid > 0){
				$existeFoto = $this->articulo->fotoArticulo($aid);
				$datos = [
					'aid'	 	  => $aid,
					'titulo' 	  => strip_tags(trim($_POST['titulo'])),
					'descripcion' => strip_tags(trim($_POST['descripcion']),'<a><p><span><b><strong><br><hr><button><i><u>'),
					'foto'   	  => ($existeFoto==false) ? subirArchivo($_FILES['foto']) : $existeFoto,
					'fecha'  	  => date('Y-m-d H:i:s'),
					'estado' 	  => ($_POST['estado']==1) ? strip_tags(trim($_POST['estado'])) : 0,
					'adid'	 	  => sesionAdmin()->adid,
					'slug'  	  => slug($_POST['titulo'])
				];

			$resultado = $this->articulo->editarArticulo($datos);
				if($resultado == true){
					redirigir('articulo/editar/'.$aid);
				}else{
						redirigir('articulo/editar/'.$aid, 'No se pudo editar el articulo, intente nuevamente!', 'error');
					}
			}else{
					redirigir('articulo', 'Debe ingresar datos!', 'sugerencia');
			}

		}

		function eliminarFotoArticulo(){
			$aid = explode('/', $_SERVER['QUERY_STRING']);
			$aid = end($aid);

			if( $aid > 0 ){
				$foto = $this->articulo->fotoArticulo($aid);
				$resultado = $this->articulo->eliminarFoto($aid);
				if($resultado==true){
					eliminarArchivo($foto);
					redirigir('articulo/editar/'.$aid);
				}else{
					redirigir('articulo/editar/'.$aid, 'No se pudo eliminar la foto, intente nuevamente!', 'error');
				}
			}else{
				redirigir('articulo', 'No hay foto que eliminar', 'sugerencia');
			}
		}
		

		
}

?>