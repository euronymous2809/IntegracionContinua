<!-- Sección pagina nueva -->
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h4><?php echo $titulo?></h4>
		</div>
	</div>
	<br/>
	
	<!-- formulario de creación -->
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form action="<?php echo config('base_url')?>pagina/actualizar/<?php echo $pagina->pid?>" method="post" enctype="multipart/form-data">
				
				<label>Título:</label>
				<input type="text" name="titulo" class="form-control" value="<?php echo $pagina->titulo?>" required>
				<br/>

				<label>Foto:</label>
				<?php if(!empty($pagina->foto)){?>
					<div style="width:120px; height:120px; background:url(<?php echo config('base_url').'archivos/'.$pagina->foto?>)center no-repeat; background-size:cover; position:relative;">
						<a href="<?php echo config('base_url')?>pagina/eliminarFotoPagina/<?php echo $pagina->pid?>" style="display:inline-block; padding:2px 7px; position:absolute; right:0; top:0; background:#fff; color:red; font-weight:bold; border:1px solid red;">
							X
						</a>
					</div>
				<?php } else{ ?>
					<input type="file" name="foto" class="form-control">
				<?php } ?>
				<br/>

				<label>Contenido:</label>
				<textarea name="texto" class="form-control"><?php echo $pagina->texto?></textarea>
				<br/>

				<label>Video:</label>
				<input type="text" name="video" class="form-control" value="<?php echo $pagina->video?>">
				<br/>

				<label>Estado:</label>
				<input type="checkbox" name="estado" value="1" <?php echo ($pagina->estado==1) ? 'checked' : ''?>>
				<br/><br/>
				
				<a href="<?php echo config('base_url')?>/pagina" class="btn btn-light w-25 float-left">
					Cancelar
				</a>

				<input type="submit" value="Guardar" class="btn btn-success w-75">
			</form>
		</div>
	</div>
</div>