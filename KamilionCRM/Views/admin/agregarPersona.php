<div class="box-principal">
	<h3 class="text-muted">PERSONAL<hr></h3>
	<div class="panel panel-success" >
		<div class="panel-heading">
	    <h3 class="panel-title">Registro</h3>
  </div>
		<fieldset class="panelregistro">
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
					<div class="section" >
						<div class="col-md-6 " >
							<div class="form-group">
								<label for="inputEmail" class="control-label">Nombre</label>
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
									<option value=""></option>
								</select>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Imagen</label>
								<input class="form-control" name="imagen" id="imagen" type="file" required>
							</div>
						</div>

						<div class="col-md-6 " >
							<div class="form-group">
								<label for="inputEmail" class="control-label">Nombre del estudiante</label>
								<input class="form-control" type="text" >
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Edad</label>
								<input class="form-control"  type="number" >
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Promedio</label>
								<input class="form-control"  type="number" >
							</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label">Sección</label>
								<select name="id_seccion" class="form-control">
									<option value=""></option>
								</select>
							</div>
						</div>
					</div>
					<div class="section">
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
</div>
