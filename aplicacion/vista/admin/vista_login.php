		<!-- Sección login -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h4>Inicio de sesión</h4>
				</div>
			</div>
			<br/>

			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="<?php echo config('base_url')?>login/validar" method="post">
						<label>Usuario</label><br/>
						<input type="email" class="form-control" name="email" required>
						<br/>
						
						<label>Clave</label><br/>
						<input type="password" class="form-control" name="clave" required>
						<br/>
						
						<input type="submit" class="form-control btn btn-primary" value="Ingresar">
					</form>
				</div>
			</div>
		</div>
