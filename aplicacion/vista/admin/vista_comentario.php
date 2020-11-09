<div class="container">
		<div class="row">
				<div class="col-md-12 text-center">
					<?php if(!empty($comentarios)){ ?>
					
				</div>
			</div>
		<br/>
		<!-- Tabla con los registros de la base de datos -->
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<td><b>id</b></td>
							<td>Comentario</td>
							<td>Visitante</td>
							<td>Fecha</td>
							<td>Estado</td>
							<td>Editar</td>
							<td>Eliminar</td>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($comentarios as $llave => $comentario) {?>
							
						
						<tr>
							<td><?php echo $comentario->cid?></td>
							<td><?php echo $comentario->comentario?></td>
							<td><?php echo $comentario->visitante?></td>
							<td><?php echo $comentario->fecha?></td>
							<td><?php echo $comentario->estado?></td>
							<td>
								<a href="" class="btn btn-primary">
								Ok
								</a>
							</td>
							<td>
								<a href="" class="btn btn-danger">
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