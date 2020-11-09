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
			<form action="<?php echo config('base_url')?>articulo/actualizar/<?php echo $articulo->aid?>" method="post" enctype="multipart/form-data">
				
				<label>Título:</label>
				<input type="text" name="titulo" class="form-control" value="<?php echo $articulo->titulo?>" required>
				<br/>

				<label>Descripción:</label>
				<textarea name="descripcion" class="form-control"><?php echo $articulo->descripcion?></textarea>
				<br/>

				<label>Foto:</label>
				<?php if(!empty($articulo->foto)){?>
					<div style="width:120px; height:120px; background:url(<?php echo config('base_url').'archivos/'.$articulo->foto?>)center no-repeat; background-size:cover; position:relative;">
						<a href="<?php echo config('base_url')?>articulo/eliminarFotoArticulo/<?php echo $articulo->aid?>" style="display:inline-block; padding:2px 7px; position:absolute; right:0; top:0; background:#fff; color:red; font-weight:bold; border:1px solid red;">
							X
						</a>
					</div>
				<?php } else{ ?>
					<input type="file" name="foto" class="form-control">
				<?php } ?>
				<br/>

				<!--<label>Fecha:</label>
				<input type="datetime" name="titulo" class="form-control" value="<?php //echo $articulo->fecha?>" required>-->

				<label>Estado:</label>
				<input type="checkbox" name="estado" value="1" <?php echo ($articulo->estado==1) ? 'checked' : ''?>>
				<br/><br/>
				
				<a href="<?php echo config('base_url')?>/articulo" class="btn btn-light w-25 float-left">
					Cancelar
				</a>

				<input type="submit" value="Guardar" class="btn btn-success w-75">
			</form>
		</div>
	</div>
</div>