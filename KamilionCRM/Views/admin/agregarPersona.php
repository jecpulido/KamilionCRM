<div class="box-principal">
	<fieldset class="panelregistro">
        <h2 class="page-header">REGISTRO PERSONAL | <a href="<?php echo URL;?>admin/listarPersona" class="btn btn-primary"><i class="fa fa-users"></i> Ver listado</a></h2>
        <div class="panel panel-primary " >
            <div class="panel-heading">
                <h3 class="panel-title">Datos Personales</h3>
            </div>
            <fieldset class="panelregistro">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
                    <div class="" >
                        <!-- documento - tipo documento -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_tipoDocumento" class="control-label">Documento</label>
                            <div class=" my-group">
                                <input class="form-control" name="per_documento" type="number" maxlength="12" title="Ingrese un numero" required>
                                <select name="per_tipoDocumento" class="form-control">
                                    <?php foreach ($datos['tipoDocumento'] as $row){ ?>
                                        <option value="<?php echo $row['ca_id']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- codigo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="codigo" class="control-label">Codigo</label>
                            <input class="form-control" name="per_codigo" type="text" maxlength="5" required>
                        </div>

                        <div class="clearfix"></div>

                        <!-- Nombre -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_nombre" class="control-label">Nombres</label>
                            <input class="form-control" name="per_nombre" type="text" >
                        </div>
                        <!-- apellido -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_apellido" class="control-label">Apellidos</label>
                            <input class="form-control" name="per_apellidos" type="text" required>
                        </div>

                        <!-- Fecha nacimiento -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_fechaNacimiento" class="control-label">Fecha Nacimiento</label>
                            <input class="form-control" name="per_fechaNacimiento" type="text" required>
                        </div>
                        <!-- genero -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_genero" class="control-label">Genero</label>
                            <select  name="per_genero" class="form-control" required>
                                <?php foreach ($datos['genero'] as $row){ ?>
                                    <option value="<?php echo $row['ca_descripcion']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- telefono -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_telefono" class="control-label">Telefono</label>
                            <input class="form-control" name="per_telefono" type="number" maxlength="7" max="9999999"  required>
                        </div>
                        <!-- celular -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_celular" class="control-label">Celular</label>
                            <input class="form-control" name="per_celular" type="number" max="4000000000" min="2999999999" required>
                        </div>

                        <!-- Estado Civil -->
                        <div class="form-registro form-group col-md-6">
                            <label for="Complemento_Admin_ca_id" class="control-label">Estado Civil</label>
                            <select name="Complemento_Admin_ca_id" class="form-control" required>
                                <?php foreach ($datos['estadoCivil'] as $row){ ?>
                                    <option value="<?php echo $row['ca_id']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- correo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_correo" class="control-label">Correo</label>
                            <input class="form-control" name="per_correo" type="email" required>
                        </div>

                        <!-- Direccion -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_direccion" class="control-label">Direccion</label>
                            <input class="form-control" name="per_direccion" type="text" required>
                        </div>
                        <!-- Cargo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_carg_id" class="control-label">Cargo</label>
                            <select  name="Cargo_carg_id" class="form-control" required>
                                <?php foreach ($datos['perfil'] as $row){ ?>
                                    <option value="<?php echo $row['carg_id']; ?>"><?php echo $row['carg_descripcion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- profesion -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_profesion" class="control-label">Profesion</label>
                            <input class="form-control" name="per_profesion" type="text" required>
                        </div>
                        <!-- Foto -->
                        <div class="form-registro form-group col-md-6">
                            <label for="foto" class="control-label">Foto</label>
                            <input class="form-control" name="foto"  type="file" required>
                        </div>
                    </div>
                    <div class="section">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="reset" class="btn btn-danger">Borrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </fieldset>
</div>
