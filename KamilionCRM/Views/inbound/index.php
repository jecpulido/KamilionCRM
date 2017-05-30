<div class="box-principal">
    <fieldset class="panelregistro">
        <h2 class="page-header">CASOS ASIGNADOS</h2>

            <div class="panel panel-danger table-responsive" style="width: 100%" >
                <div class="panel-heading" style="width: 100%">
                    <h3 class="panel-title">CASOS POR GESTIONAR</h3>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>CASO</th>
                        <th>ID AVAYA</th>
                        <th>ESTADO</th>
                        <th>FECHA REGISTRO</th>
                        <th>MIN</th>
                        <th>CIUDAD</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datos as $row){ ?>
                        <tr>
                            <td><?php echo $row['inb_Caso'];?></td>
                            <td><?php echo $row['inb_IdLlamada'];?></td>
                            <td><?php echo $row['inb_Estado'];?></td>
                            <td><?php echo $row['inb_FechaIngreso'];?></td>
                            <td><?php echo $row['inb_MinCliente'];?></td>
                            <td><?php echo $row['inb_Ciudad'];?></td>
                            <td><a class="btn btn-danger" href="<?php echo URL; ?>inbound/gestionInbound/<?php echo $row['inb_Caso']; ?>">Gestionar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>


    </fieldset>
</div>
