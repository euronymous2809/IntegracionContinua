
<div class="container">
		<div class="row">
				<div class="col-md-12 text-center">
					<?php if(!empty($paginas)){ ?>
					
				</div>
			</div>
		<br/>
		<!-- Tabla con los registros de la base de datos -->
		<div class="row">
				<div class="col-md-12">
					<a href="<?php echo config('base_url')?>pagina/nueva" class="btn btn-primary">
						Crear Nueva
					</a>
					
				</div>
			<div class="col-md-12">
				<br/>
				<table class="table">
					<thead>
						<tr>
							<td><b>id</b></td>
							<td>Título</td>
							<td>Estado</td>
							<td>Administrador</td>
							<td>Editar</td>
							<td>Eliminar</td>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($paginas as $llave => $pagina) {?>
							
						
						<tr>
							<td><?php echo $pagina->pid?></td>
							<td><?php echo $pagina->titulo?></td>
							<td><?php echo $pagina->estado?></td>
							<td><?php echo $pagina->administrador?></td>
							<td>
								<a href="<?php echo config('base_url').'pagina/editar/'.$pagina->pid?>" class="btn btn-primary">
								Ok
								</a>
							</td>
							<td>
								<a href="<?php echo config('base_url').'pagina/eliminar/'.$pagina->pid?>" class="btn btn-danger">
								X
							</a>
							</td>
						</tr>						
						<?php } ?>
					</tbody>
				<?php  } else { ?>
					<h5> No hay registros para mostrar!</h5>
					</a>

				<?php } ?>
				</table>

			</div>

		</div>

</div>