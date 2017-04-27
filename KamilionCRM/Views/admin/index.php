<div class="box-principal">
	<fieldset>
	<h3 class="titulo">PERFIL<hr></h3>
	<legend></legend>


			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Nombre del estudiante</label>
								<input class="form-control" name="nombre" type="text" required>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Edad</label>
								<input class="form-control" name="edad" type="number" required>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Promedio</label>
								<input class="form-control" name="promedio" type="number" required>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Sección</label>
								<select name="id_seccion" class="form-control">

									<option value="1">Opcion</option>

								</select>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Imagen</label>
								<input class="form-control" name="imagen" id="imagen" type="file" required>
							</div>
						</div>


					</div>
					<div class="row">
						<div class="col-md-12 ">
							<div class="form-group">
								<button type="submit" class="btn btn-success">Registrar</button>
								<button type="reset" class="btn btn-warning">Borrar</button>
							</div>
						</div>
					</div>
			</form>

	</fieldset>
</div>
