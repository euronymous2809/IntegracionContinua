<div class="container">
		<div class="row">
				<div class="col-md-12 text-center">
					<?php 
					
					if(!empty($visitantes)){ ?>
					
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
							<td>Nombre</td>
							<td>Email</td>
							<td>Teléfono</td>
							<td>Estado</td>
							<td>Editar</td>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($visitantes as $llave => $visitante) {?>
							
						
						<tr>
							<td><?php echo $visitante->vid?></td>
							<td><?php echo $visitante->nombre?></td>
							<td><?php echo $visitante->email?></td>
							<td><?php echo $visitante->telefono?></td>
							<td><?php echo $visitante->estado?></td>
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
					<h5> No hay registros paramostrar! otra vez</h5>
					
				<?php } ?>
				</table>

			</div>

		</div>

</div>