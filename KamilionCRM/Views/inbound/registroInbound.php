<div class="box-principal">
    <fieldset class="panelregistro">
        <h2 class="page-header">REGISTRO INBOUND</h2>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" id="registroInbound">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title">REGISTRO</h3>
                </div>
                <fieldset class="panelregistro">
                    <div>
                        <!-- ID AVAYA -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_IdLlamada" class="control-label">ID AVAYA</label>
                            <input class="form-control" id="inb_IdLlamada" name="inb_IdLlamada" type="number" required>
                        </div>
                        <!-- caso -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_Caso" class="control-label">CASO</label>
                            <input  id="inb_Caso" name="inb_Caso" type="number" class="form-control" required>
                        </div>

                        <!-- MIN -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_MinCliente" class="control-label">MIN</label>
                            <input class="form-control" id="inb_MinCliente" name="inb_MinCliente" type="number">
                        </div>
                        <!-- MIN ALTERNO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_MinAlternoCliente" class="control-label">MIN ALTERNO</label>
                            <input class="form-control" id="inb_MinAlternoCliente" name="inb_MinAlternoCliente" type="number" required>
                        </div>

                        <!-- USUARIO REPORTA -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_UsuarioReporta" class="control-label">USUARIO REPORTA</label>
                            <input class="form-control" id="inb_UsuarioReporta" name="inb_UsuarioReporta" type="text" required>
                        </div>
                        <!-- NOMBRE CLIENTE -->
                        <div class="form-registro form-group col-md-6">
                            <label for="inb_NombreCliente" class="control-label">NOMBRE CLIENTE</label>
                            <input class="form-control" id="inb_NombreCliente" name="inb_NombreCliente" type="text"
                                   required>
                        </div>

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
                    <div >
                        <!-- LINEA SERVICIO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_LServicio" class="control-label">LINEA SERVICIO</label>
                            <select id="crm_LServicio" name="crm_LServicio" class="form-control">
                                <?php foreach ($datos['diag'] as $row) { ?>
                                    <option value="<?php echo $row['diag_Tipificacion1'] ?>"><?php echo utf8_encode($row['diag_Tipificacion1']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- SERVICIO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Servicio" class="control-label">SERVICIO</label>
                            <select id="crm_Servicio" name="crm_Servicio" class="form-control">
                            </select>
                        </div>

                        <!-- SOLICITUD / TIPO FALLA -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Solicitud" class="control-label">SOLICITUD / TIPO FALLA</label>
                            <select id="crm_Solicitud" name="crm_Solicitud" class="form-control">
                            </select>
                        </div>
                        <!-- SEGMENTO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Segmento" class="control-label">SEGMENTO</label>
                            <select id="crm_Segmento" name="crm_Segmento" class="form-control">
                            </select>
                        </div>

                        <!-- CAUSA RAIZ -->
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
                    <div >
                        <!-- ESTADO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Tipificacion" class="control-label">ESTADO</label>
                            <select id="crm_Tipificacion" name="crm_Tipificacion" class="form-control">
                            </select>
                        </div>
                        <!-- CATEGORIA CIERRE -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_CategoriaCierre" class="control-label">CATEGORIA CIERRE</label>
                            <select id="crm_CategoriaCierre" name="crm_CategoriaCierre" class="form-control">
                            </select>
                        </div>

                        <!-- PQR -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_PQR" class="control-label">PQR</label>
                            <input class="form-control" id="crm_PQR" name="crm_PQR" type="text">
                        </div>
                        <!-- TIPO PQR -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_TPQR" class="control-label">TIPO PQR</label>
                            <select id="crm_TPQR" name="crm_TPQR" class="form-control">
                                <option value="- Seleccione -">- Seleccione -</option>
                                <option value="Pospago">Pospago</option>
                                <option value="Prepago">Prepago</option>
                            </select>
                        </div>

                        <!-- INCONSISTENCIA -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_Inconsistencia" class="control-label">INCONSISTENCIA</label>
                            <select id="crm_Inconsistencia" name="crm_Inconsistencia" class="form-control" required>
                                <option value="- Seleccione -">- Seleccione -</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <!-- FECHA PROGRAMADO -->
                        <div class="form-registro form-group col-md-6">
                            <label for="crm_FechaProgra" class="control-label">FECHA PROGRAMADO</label>
                            <input class="form-control" id="crm_FechaProgra" name="crm_FechaProgra" type="datetime" maxlength="80">
                        </div>

                    </div>

                </fieldset>
                <div class="panel-heading">
                    <h3 class="panel-title"><label for="crm_Observacion" style="margin-bottom: 0px !important;">OBSERVACION</label>
                    </h3>
                </div>
                <fieldset class="panelregistro">
                    <div >
                        <!-- ID AVAYA -->
                        <div class="form-registro form-group col-md-12">
                            <textarea class="form-control" rows="3" id="crm_Observacion" name="crm_Observacion"></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="section">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Registrar</button>
                        <button type="reset" class="btn btn-danger">Borrar</button>
                    </div>
                </div>
            </div>
        </form>
    </fieldset>
</div>
