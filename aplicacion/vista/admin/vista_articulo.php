
<div class="container">
		<div class="row">
				<div class="col-md-12 text-center">
					<?php if(!empty($articulos)){ ?>
					
				</div>
			</div>
		<br/>
		<!-- Tabla con los registros de la base de datos -->
		<div class="row">
			<div class="col-md-12">

				<a href="<?php echo config('base_url')?>articulo/nuevo" class="btn btn-primary">
						Crear Nueva
					</a>
					
		</div>
		<div class="col-md-14">
			<br/>
				<table class="table">
					<thead>
						<tr>
							<td><b>id</b></td>
							<td>Título</td>
							<td>Descripción</td>
							<td>Administrador</td>
							<td>Fecha</td>
							<td>Estado</td>
							<td>Puntuación</td>							
							<td>Editar</td>
							<td>Eliminar</td>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($articulos as $llave => $articulos) {?>
							
						
						<tr>
							<td><?php echo $articulos->aid?></td>
							<td><?php echo $articulos->titulo ?></td>
							<td><?php echo $articulos->descripcion?></td>
							<td><?php echo $articulos->administrador?></td>
							<td><?php echo $articulos->fecha?></td>
							<td><?php echo $articulos->estado?></td>

							<td><?php if($articulos->puntos == null){
								echo "Sin calificación";
								}else{
									echo $articulos->puntos;
								}
								?></td>
							<td>
								<a href="<?php echo config('base_url').'articulo/editar/'.$articulos->aid?>" class="btn btn-primary">
								Ir
								</a>
							</td>
							<td>
								<a href="<?php echo config('base_url').'articulo/eliminar/'.$articulos->aid?>" class="btn btn-danger">
								X
							</a>
							</td>
						</tr>						
						<?php } ?>
					</tbody>
				<?php  } else { ?>
					<h5> No hay registros paramostrar!</h5>

				<?php } ?>
				</table>
			</div>

		</div>

</div>