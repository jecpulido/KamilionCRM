<?php echo $datos['per_estado'];?>
<div class="box-principal">
    <fieldset class="panelregistro">
        <h3 class="text-muted">PERSONAL | <?php echo $datos['per_nombre']." ".$datos['per_apellidos']; ?>
            <a href="javascript:history.back()" class="btn btn-default pull-right"> Volver</a><hr></h3>

        <div class="panel panel-success table-responsive" style="width: 100%" >
            <div class="panel-heading" style="width: 100%">
                <h3 class="panel-title">Perfil de <?php echo $datos['per_nombre']; ?></h3>
            </div>
            <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/avatars/<?php echo $datos['per_rutaFoto']; ?>">
                    <ul class="list-group">

                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <b>Codigo: </b><?php echo $datos['per_codigo']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Documento: </b><?php echo $datos['per_documento']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Estado: </b><?php echo ($datos['per_estado']==1) ? "Activo":"Inactivo"; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Telefono: </b><?php echo $datos['per_telefono']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Celular: </b><?php echo $datos['per_celular']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Correo: </b><?php echo $datos['per_correo']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Cargo: </b><?php echo $datos['Cargo_carg_id']; ?>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <b>Estado civil: </b><?php echo $datos['Complemento_Admin_ca_id']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Profesion: </b><?php echo $datos['per_profesion']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha Nacimiento: </b><?php echo $datos['per_fechaNacimiento']; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Genero: </b><?php echo $datos['per_genero']; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    <fieldset>
</div>