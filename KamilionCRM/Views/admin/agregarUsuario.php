<div class="box-principal">
    <fieldset class="panelregistro">
        <h3 class="text-muted">USUARIOS | REGISTRO | <?php echo $datos['per_nombre']." ".$datos['per_apellidos'] ?> <hr></h3>
        <div class="panel panel-success " >
            <div class="panel-heading">
                <h3 class="panel-title">Datos Persona</h3>
            </div>
            <fieldset class="panelregistro">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
                    <div class="" >
                        <!-- codigo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="Personal_per_codigo" class="control-label">Codigo</label>
                            <input class="form-control" name="Personal_per_codigo" type="text" maxlength="5" readonly required>
                        </div>
                        <!-- Usuario-->
                        <div class="form-registro form-group col-md-6">
                            <label for="usu_id" class="control-label">Usuario</label>
                            <input class="form-control" name="usu_id" type="text" required>
                        </div>

                        <!-- Perfil -->
                        <div class="form-registro form-group col-md-6">
                            <label for="Perfil_perf_id" class="control-label">Perfil</label>
                            <select  name="Perfil_perf_id" class="form-control" required>
                                <?php foreach ($datos['genero'] as $row){ ?>
                                    <option value="<?php echo $row['ca_descripcion']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Jefe Inmediato-->
                        <div class="form-registro form-group col-md-6">
                            <label for="usu_jefe" class="control-label">Jefe Inmediato</label>
                            <input class="form-control" name="usu_jefe" type="text" required>
                        </div>

                        <!-- Contraseña -->
                        <div class="form-registro form-group col-md-6">
                            <label for="usu_pass" class="control-label">Contreseña</label>
                            <input class="form-control" name="usu_pass" type="password"  required>
                        </div>
                        <!-- Confirmar Contraseña -->
                        <div class="form-registro form-group col-md-6">
                            <label for="usu_pass2" class="control-label">Confirmar Contrseña</label>
                            <input class="form-control" name="usu_pass2" type="password" required>
                        </div>
                        <!-- Estado Civil -->
                    </div>
                    <div class="section">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </fieldset>
</div>
