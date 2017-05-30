<div class="box-principal">
    <fieldset class="panelregistro">
        <h2 class="page-header">GESTION INBOUND</h2>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" id="registroInbound" >
            <div class="panel panel-primary " >
                <div class="panel-heading">
                    <h3 class="panel-title">SMARTPHONE INBOUND</h3>
                </div>
                <fieldset class="panelregistro">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>CASO: <?php echo $datos['caso']['inb_Caso'];?> </b>
                                </li>
                                <li class="list-group-item">
                                    <b>MIN: <?php echo $datos['caso']['inb_MinCliente'];?> </b>
                                </li>
                                <li class="list-group-item">
                                    <b>USUARIO REPORTA: <?php echo $datos['caso']['inb_UsuarioReporta'];?> </b>
                                </li>

                                <li class="list-group-item">
                                    <b>ESTADO: <?php echo $datos['caso']['inb_Estado'];?> </b>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>ID AVAYA: <?php echo $datos['caso']['inb_IdLlamada'];?> </b>
                                </li>
                                <li class="list-group-item">
                                    <b>MIN ALTERNO: <?php echo $datos['caso']['inb_MinAlternoCliente'];?> </b>
                                </li>

                                <li class="list-group-item">
                                    <b>FECHA INGRESO: <?php echo $datos['caso']['inb_FechaIngreso'];?> </b>
                                </li>
                                <input  id="crm_Barrio" name="inb_Caso" type="text" value="<?php echo $datos['caso']['inb_Caso'];?>" hidden>
                                <input  id="crm_Barrio" name="crm_MinAlterno" type="text" value="<?php echo $datos['caso']['inb_MinAlternoCliente'];?>" hidden>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>NOMBRE CLIENTE: <?php echo $datos['caso']['inb_NombreCliente'];?> </b>
                                </li>
                                <li class="list-group-item">
                                    <b>USUARIO KAM: <?php echo $datos['caso']['Usuarios_usu_id'];?> </b>
                                </li>
                                <li class="list-group-item">
                                    <b>CIUDAD: <?php echo $datos['caso']['inb_Ciudad'];?> </b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </fieldset>
                <div class="panel-heading">
                    <h3 class="panel-title">REGISTRO</h3>
                </div>
                <fieldset class="panelregistro">
                    <div CLASS="">
                        <!-- MARCA -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_marca" class="control-label">MARCA</label>
                            <select id="crm_marca" name="crm_marca" class="form-control">
                                <?php foreach ($datos['marca'] as $row) { ?>
                                    <option value="<?php echo $row['eq_marca'] ?>"><?php echo utf8_encode($row['eq_marca']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- EQUIPO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Equipo" class="control-label">EQUIPO</label>
                            <select id="crm_Equipo" name="crm_Equipo" class="form-control">
                            </select>
                        </div>

                        <!-- DEPARTAMENTO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_dpto" class="control-label">DEPARTAMENTO</label>
                            <select id="inb_dpto" name="inb_dpto" class="form-control">
                                <?php foreach ($datos['dpto'] as $row) { ?>
                                    <option value="<?php echo $row['divp_IdDepartamento'] ?>"><?php echo utf8_encode($row['divp_Departamento']) ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- CIUDAD -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_Ciudad" class="control-label">CIUDAD</label>
                            <select id="inb_Ciudad" name="inb_Ciudad" class="form-control">
                            </select>
                        </div>

                        <!-- BARRIO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Barrio" class="control-label">BARRIO</label>
                            <input class="form-control" id="crm_Barrio" name="crm_Barrio" type="text" maxlength="80">
                        </div>
                    </div>
                </fieldset>
                <div class="panel-heading">
                    <h3 class="panel-title">DIAGNOSTICO</h3>
                </div>
                <fieldset class="panelregistro">
                    <div class="" >
                        <!-- ID AVAYA -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_LServicio" class="control-label">LINEA SERVICIO</label>
                            <select id="crm_LServicio" name="crm_LServicio" class="form-control">
                                <?php foreach ($datos['diag'] as $row) { ?>
                                    <option value="<?php echo $row['diag_Tipificacion1'] ?>"><?php echo utf8_encode($row['diag_Tipificacion1']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- codigo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Servicio" class="control-label">SERVICIO</label>
                            <select id="crm_Servicio" name="crm_Servicio" class="form-control">
                            </select>
                        </div>

                        <!-- Nombre -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Solicitud" class="control-label">SOLICITUD / TIPO FALLA</label>
                            <select id="crm_Solicitud" name="crm_Solicitud" class="form-control">
                            </select>
                        </div>
                        <!-- apellido -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Segmento" class="control-label">SEGMENTO</label>
                            <select id="crm_Segmento" name="crm_Segmento" class="form-control">
                            </select>
                        </div>

                        <!-- genero -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_CausaRaiz" class="control-label">CAUSA RAIZ</label>
                            <select id="crm_CausaRaiz" name="crm_CausaRaiz" class="form-control">
                            </select>
                        </div>

                    </div>
                </fieldset>
                <div class="panel-heading">
                    <h3 class="panel-title">CIERRE</h3>
                </div>
                <fieldset class="panelregistro">
                    <div class="" >
                        <!-- ID AVAYA -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Tipificacion" class="control-label">ESTADO</label>
                            <select id="crm_Tipificacion" name="crm_Tipificacion" class="form-control">
                            </select>
                        </div>
                        <!-- codigo -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_CategoriaCierre" class="control-label">CATEGORIA CIERRE</label>
                            <select id="crm_CategoriaCierre" name="crm_CategoriaCierre" class="form-control">
                            </select>
                        </div>

                        <!-- Nombre -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_PQR" class="control-label">PQR</label>
                            <input class="form-control" id="crm_PQR" name="crm_PQR" type="text" >
                        </div>
                        <!-- apellido -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_TPQR" class="control-label">TIPO PQR</label>
                            <select id="crm_TPQR" name="crm_TPQR" class="form-control">
                                <option value="- Seleccione -">- Seleccione -</option>
                                <option value="Pospago">Pospago</option>
                                <option value="Prepago">Prepago</option>
                            </select>
                        </div>

                        <!-- genero -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Inconsistencia" class="control-label">INCONSISTENCIA</label>
                            <select id="crm_Inconsistencia" name="crm_Inconsistencia" class="form-control" required>
                                <option value="- Seleccione -">- Seleccione -</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_FechaProgra" class="control-label">FECHA PROGRAMADO</label>
                            <input class="form-control" id="crm_FechaProgra" name="crm_FechaProgra" type="text" maxlength="80">
                        </div>

                    </div>

                </fieldset>
                <div class="panel-heading">
                    <h3 class="panel-title"><label for="crm_Observacion" style="margin-bottom: 0px !important;">OBSERVACION</label></h3>
                </div>
                <fieldset class="panelregistro">
                    <div class="" >
                        <!-- ID AVAYA -->
                        <div class="form-registro form-group col-md-12">
                            <textarea class="form-control" rows="3" id="crm_Observacion" name="crm_Observacion" ></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="section">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <a href="<?php echo URL;?>inbound" class="btn btn-danger">CANCELAR</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="panel panel-warning table-responsive" style="width: 100%" >
            <div class="panel-heading" style="width: 100%">
                <h3 class="panel-title">GESTIONES</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID CRM</th>
                    <th>TIPIFICACION</th>
                    <th>FECHA REGISTRO</th>
                    <th>USUARIO REGISTRA</th>
                    <th>OBSERVACION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datos['gestion'] as $row){ ?>
                    <tr>
                        <td><?php echo $row['crm_id'];?></td>
                        <td><?php echo $row['crm_Tipificacion'];?></td>
                        <td><?php echo $row['crm_FechaRegistro'];?></td>
                        <td><?php echo $row['Usuarios_usu_id'];?></td>
                        <td><?php echo $row['crm_Observacion'];?></td>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>
