<div class="container">
		<div class="row">
				<div class="col-md-12 text-center">
					<h4><?php echo $titulo?></h4>
					
										
				</div>
			</div>
		<br/>
		<!--Formulario de creacion-->

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="<?php echo config('base_url')?>Articulo/crear" method="post" enctype="multipart/form-data">
					<label>Titulo:</label>
					<input type="text" name="titulo" class="form-control" required>
					<br/>

					<label>Descripción:</label>
					<textarea name="descripcion" class="form-control"></textarea>
					<br/>

					<label>Foto:</label>
					<input type="file" name="foto" class="form-control">
					<br/>
					
					<!--<label>Fecha:</label>
					<input type="datetime" name="fecha" class="form-control">
					<br/>-->


					<label>Estado</label>
					<input type="checkbox" name="estado" value="1" checked>
					<br/>

					<a href="<?php echo config('base_url')?>/articulo" class="btn btn-light w-25 float-left">
						Cancelar
					</a>

					<input type="submit" value="Guardar" class= "btn btn-success w-75">
					<br/><br/>

				
					</form>
			</div>
		</div>
</div>	




