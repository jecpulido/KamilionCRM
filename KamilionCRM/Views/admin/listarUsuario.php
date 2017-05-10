<div class="box-principal">
    <fieldset class="panelregistro">
        <h2 class="page-header">CONTROL USUARIOS</h2>
        <div class="panel panel-danger table-responsive" style="width: 100%" >
            <div class="panel-heading" style="width: 100%">
                <h3 class="panel-title">PENDIENTE POR CREAR</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRES</th>
                    <th>CARGO</th>
                    <th>ESTADO</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datos["sin"] as $row){ ?>
                    <tr>
                        <td><?php echo $row['per_codigo']; ?></td>
                        <td><?php echo $row['per_nombre']." ".$row['per_apellidos']; ?></td>
                        <td><?php echo $row['carg_descripcion']; ?></td>
                        <td><?php echo ($row['per_estado']==1) ? "Activo":"Inactivo"; ?></td>
                        <td><a class="btn btn-danger" href="<?php echo URL; ?>admin/agregarUsuario/<?php echo $row['per_codigo']; ?>">Crear</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="panel panel-success table-responsive" style="width: 100%" >
            <div class="panel-heading" style="width: 100%">
                <h3 class="panel-title">USUARIOS</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>USUARIO</th>
                    <th>NOMBRES</th>
                    <th>CARGO</th>
                    <th>ESTADO</th>
                    <th>PERFIL</th>
                    <th>JEFE</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datos["con"] as $row){ ?>
                    <tr>
                        <td><?php echo $row['per_codigo']; ?></td>
                        <td><?php echo $row['usu_id']; ?></td>
                        <td><?php echo $row['per_nombre']." ".$row['per_apellidos']; ?></td>
                        <td><?php echo $row['carg_descripcion']; ?></td>
                        <td><?php echo $row['per_estado']; ?></td>
                        <td><?php echo $row['Perfil_perf_id']; ?></td>
                        <td><?php echo $row['usu_jefe']; ?></td>
                        <td><a class="btn btn-success" href="<?php echo URL; ?>admin/editarPersona/<?php echo $row['per_codigo']; ?>">Editar</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>
