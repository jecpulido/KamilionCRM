<div class="box-principal">
    <fieldset class="panelregistro">
        <h3 class="text-muted">PERSONAL | LISTADO<hr></h3>
        <div class="panel panel-success table-responsive" style="width: 100%" >
            <div class="panel-heading" style="width: 100%">
                <h3 class="panel-title">Datos Personales</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>FOTO</th>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>DOCUMENTO</th>
                        <th>CARGO</th>
                        <th>ESTADO</th>
                        <th>CELULAR</th>
                        <th>PROFESION</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($datos as $row){ ?>
                    <tr>
                        <td><img class="imagen-avatar" width="50px" height="50px" src="<?php echo URL; ?>Views/template/imagenes/avatars/<?php echo $row['per_rutaFoto']; ?>"></td>
                        <td><a href="<?php echo URL; ?>admin/verPersona/<?php echo $row['per_codigo']; ?>"><?php echo $row['per_codigo']; ?></a></td>
                        <td><?php echo $row['per_nombre']; ?></td>
                        <td><?php echo $row['per_apellidos']; ?></td>
                        <td><?php echo $row['per_documento']; ?></td>
                        <td><?php echo $row['Complemento_Admin_ca_id']; ?></td>
                        <td><?php echo $row['per_estado']; ?></td>
                        <td><?php echo $row['per_celular']; ?></td>
                        <td><?php echo $row['per_profesion']; ?></td>
                        <td><a class="btn btn-warning" href="<?php echo URL; ?>admin/editarPersona/<?php echo $row['per_codigo']; ?>">Editar</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <fieldset>
</div>