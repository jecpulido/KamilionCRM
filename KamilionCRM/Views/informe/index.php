<div class="box-principal">
    <fieldset class="panelregistro">
        <h2 class="page-header">INFORMES</h2>
        <div class="panel panel-yellow table-responsive" style="width: 100%" >
            <div class="panel-heading" style="width: 100%">
                <h3 class="panel-title">INFORME SOLICITADO</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>FECHA</th>
                    <th>SEGUIMIENTO</th>
                    <th>PROGRAMADO</th>
                    <th>NO CONTACTADO</th>
                    <th>SOLICITUD ESCALAR SD</th>
                    <th>SOLICITUD ESCALAR CPD</th>
                    <th>CERRADO</th>
                    <th>TOTAL</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datos['solic'] as $row){ ?>
                    <tr>
                        <td><?php echo $row['Fecha'];?></td>
                        <td><?php echo $row['Seguimiento'];?></td>
                        <td><?php echo $row['Programado'];?></td>
                        <td><?php echo $row['No Contactado'];?></td>
                        <td><?php echo $row['Solicitud Escalar SD'];?></td>
                        <td><?php echo $row['Solicitud Escalar CPD'];?></td>
                        <td><?php echo $row['Cerrado'];?></td>
                        <td><?php echo $row['Total'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>


    </fieldset>
</div>
