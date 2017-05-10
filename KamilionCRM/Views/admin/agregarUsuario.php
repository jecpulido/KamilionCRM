<div class="box-principal">
    <fieldset class="panelregistro">
        <h2 class="page-header">REGISTRO USUARIO | <?php echo $datos['persona']['per_nombre']." ".$datos['persona']['per_apellidos'] ?> |<a href="<?php echo URL;?>admin/listarUsuario" class="btn btn-primary"><i class="fa fa-users"></i> Ver listado</a></h2>
        <div class="panel panel-primary " >
            <div class="panel-heading">
                <h3 class="panel-title">Datos Persona</h3>
            </div>
            <fieldset class="panelregistro">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
                    <div class="" >
                        <!-- codigo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="Personal_per_codigo" class="control-label">Codigo</label>
                            <input class="form-control" name="Personal_per_codigo" type="text" value="<?php echo $datos['persona']['per_codigo']; ?>" maxlength="5" readonly required>
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
                                <?php foreach ($datos['perfil'] as $row){ ?>
                                    <option value="<?php echo $row['perf_id']; ?>"><?php echo $row['perf_descripcion']; ?></option>
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
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </fieldset>
</div>
