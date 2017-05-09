<div class="box-principal">
    <fieldset class="panelregistro">
        <h3 class="text-muted">PERSONAL | EDITAR
            <a href="javascript:history.back()" class="btn btn-default pull-right"> Volver</a>  <hr></h3>
        <div class="panel panel-success " >
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
                                <input class="form-control" name="per_documento" type="number" maxlength="12" title="Ingrese un numero" value="<?php echo $datos['persona']['per_documento']; ?>"  required>
                                <select name="per_tipoDocumento" class="form-control">
                                    <?php foreach ($datos['tipoDocumento'] as $row){ ?>
                                        <?php if($row['ca_id'] == $datos['persona']['per_tipoDocumento']){?>
                                            <option selected value="<?php echo $row['ca_id']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row['ca_id']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                        <?php }?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- codigo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="codigo" class="control-label">Codigo</label>
                            <input class="form-control" name="per_codigo" type="text" maxlength="5" value="<?php echo $datos['persona']['per_codigo']; ?>" readonly required>
                        </div>

                        <div class="clearfix"></div>

                        <!-- Nombre -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_nombre" class="control-label">Nombres</label>
                            <input class="form-control" name="per_nombre" type="text" value="<?php echo $datos['persona']['per_nombre']; ?>">
                        </div>
                        <!-- apellido -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_apellido" class="control-label">Apellidos</label>
                            <input class="form-control" name="per_apellidos" type="text" value="<?php echo $datos['persona']['per_apellidos']; ?>" required>
                        </div>

                        <!-- Fecha nacimiento -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_fechaNacimiento" class="control-label">Fecha Nacimiento</label>
                            <input class="form-control" name="per_fechaNacimiento" type="text" placeholder="aaaa-mm-dd" value="<?php echo $datos['persona']['per_fechaNacimiento']; ?>" required>
                        </div>
                        <!-- genero -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_genero" class="control-label">Genero</label>
                            <select  name="per_genero" class="form-control" required>
                                <?php foreach ($datos['genero'] as $row){ ?>
                                    <?php if($row['ca_descripcion']==$datos['persona']['per_genero']){ ?>
                                        <option selected value="<?php echo $row['ca_descripcion']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $row['ca_descripcion']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- telefono -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_telefono" class="control-label">Telefono</label>
                            <input class="form-control" name="per_telefono" type="number" maxlength="7" max="9999999" value="<?php echo $datos['persona']['per_telefono']; ?>" required>
                        </div>
                        <!-- celular -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_celular" class="control-label">Celular</label>
                            <input class="form-control" name="per_celular" type="number" max="4000000000" min="2999999999" value="<?php echo $datos['persona']['per_celular']; ?>" required>
                        </div>

                        <!-- Estado Civil -->
                        <div class="form-registro form-group col-md-6">
                            <label for="Complemento_Admin_ca_id" class="control-label">Estado Civil</label>
                            <select name="Complemento_Admin_ca_id" class="form-control"  required>
                                <?php foreach ($datos['estadoCivil'] as $row){ ?>
                                    <?php if($row['ca_id']==$datos['persona']['Complemento_Admin_ca_id']){ ?>
                                        <option selected value="<?php echo $row['ca_id']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $row['ca_id']; ?>"><?php echo $row['ca_descripcion']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- correo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_correo" class="control-label">Correo</label>
                            <input class="form-control" name="per_correo" type="email" value="<?php echo $datos['persona']['per_correo']; ?>" required>
                        </div>

                        <!-- Direccion -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_direccion" class="control-label">Direccion</label>
                            <input class="form-control" name="per_direccion" type="text" value="<?php echo $datos['persona']['per_direccion']; ?>" required>
                        </div>
                        <!-- Cargo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_carg_id" class="control-label">Cargo</label>
                            <select  name="Cargo_carg_id" class="form-control" required>
                                <?php foreach ($datos['perfil'] as $row){ ?>
                                    <?php if ($row['carg_id'] == $datos['persona']['Cargo_carg_id']){?>
                                        <option selected value="<?php echo $row['carg_id']; ?>"><?php echo $row['carg_descripcion']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $row['carg_id']; ?>"><?php echo $row['carg_descripcion']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- profesion -->
                        <div class="form-registro form-group col-md-6">
                            <label for="per_profesion" class="control-label">Profesion</label>
                            <input class="form-control" name="per_profesion" type="text" value="<?php echo $datos['persona']['per_profesion']; ?>" required>
                        </div>
                        <div class="form-registro form-group col-md-6">
                            <label for="per_carg_id" class="control-label">Estado</label>
                            <select  name="per_estado" class="form-control" required>
                                <option value="- Seleccione -">- Seleccione -</option>
                                <?php if ($datos['persona']['per_estado']=='1'){?>
                                    <option selected value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                <?php }else if($datos['persona']['per_estado']=='0'){ ?>
                                    <option value="1">Activo</option>
                                    <option selected value="0">Inactivo</option>
                                <?php }else{?>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </fieldset>
</div>
