<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $titulo?></title>
</head>
	<body>
			
<div class="container">
	<div class="col-md-12 text-center">
				<h3>Micms</h3>
				<h1>Páginas disponibles</h1>
				<img src="archivos/paginas.jpg" height="200" width="1000">
			
		

		<ul>
				<?php foreach($menu as $boton){?>
			<li>
				<a href="<?php echo config('base_url').$boton->slug?>">
					<?php echo $boton->titulo?>
				</a>
			</li>
				<?php }?>
		</ul>
		<br/>
	</div>
</div>
<div class="container">
	<div class="col-md-12 text-center">
		<h1><?php echo $pagina->titulo ?></h1>
		<img src="<?php echo config('base_url').'archivos/'.$pagina->foto?>" width="400">
		<br/>
		<br/>
		<p><?php echo $pagina->texto?></p>




	</div>
</div>
	</body>
</html>