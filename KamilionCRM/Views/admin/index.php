<div class="box-principal">
    <fieldset class="panelregistro">
        <h2 class="page-header"
            style="text-transform: uppercase"><?php echo $datos['per_nombre'] . " " . $datos['per_apellidos']; ?>
        </h2>
        <div class="panel panel-primary table-responsive" style="width: 100%">
            <div class="panel-heading" style="width: 100%">
                <h3 class="panel-title">Perfil de <?php echo $datos['per_nombre']; ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-responsive"
                             src="<?php echo URL; ?>Views/template/imagenes/avatars/<?php echo $datos['per_rutaFoto']; ?>">
                    </div>
                    <div class="col-md-9">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>Nombre:</b><?php echo $datos['per_nombre'] . "" . $datos['per_apellidos']; ?>
                            </li>
                            <li class="list-group-item">
                                <b>Codigo: </b><?php echo $datos['per_codigo']; ?>
                            </li>
                            <li class="list-group-item">
                                <b>Documento: </b><?php echo $datos['per_documento']; ?>
                            </li>
                            <li class="list-group-item">
                                <b>Profesion: </b><?php echo $datos['per_profesion']; ?>
                            </li>
                            <li class="list-group-item">
                                <b>Cargo </b><?php echo $datos['Cargo_carg_id']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <fieldset>
</div>