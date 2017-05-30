<?php


include_once "Conexion.php";
If ($_POST) {
    //eq_marca -LLENAR EQUIPO
    if (isset($_POST['eq_marca'])) {
        $sql = "select eq_equipo,eq_equipo from equipostandar where eq_marca='" . $_POST['eq_marca'] . "'";
        $datos = consulta($sql,"eq_equipo","eq_equipo");
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['eq_equipo'] . "'>" . $row['eq_equipo'] . "</option>") . "\n";
        }
    }
    //divp_IdDepartamento - LLENAR CIUDAD
    if (isset($_POST['divp_IdDepartamento'])) {
        $sql = "select divp_id,divp_Ciudad from division_politica where divp_IdDepartamento='" . $_POST['divp_IdDepartamento'] . "'";
        $datos = consulta($sql,"divp_id","divp_Ciudad");
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['divp_id'] . "/".$row['divp_Ciudad']."'>" . $row['divp_Ciudad'] . "</option>") . "\n";
        }
    }
    //diag_Tipificacion1 - LLENAR SERVICIO
    if (isset($_POST['diag_Tipificacion1'])) {
        $sql = "SELECT diag_Cod_diagnostico,diag_Tipificacion2 FROM diagnostico WHERE diag_Tipificacion1='".$_POST['diag_Tipificacion1']."' and diag_Pertenece='servicio1'";
        $datos = consulta($sql,"diag_Cod_diagnostico","diag_Tipificacion2");
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['diag_Cod_diagnostico'] . "'>" . $row['diag_Tipificacion2'] . "</option>") . "\n";
        }
    }
    //diag_Cod_diagnostico diag_Tipificacion2 - SOLICITUD
    if (isset($_POST['diag_Cod_diagnostico']) and (isset($_POST['diag_Tipificacion2']))) {
        $sql = "SELECT diag_Cod_diagnostico,diag_Tipificacion1 FROM diagnostico WHERE diag_Pertenece='Servicio2' and diag_Tipificacion4 like '%".$_POST['diag_Cod_diagnostico']."%'";
        $datos = consulta($sql,"diag_Cod_diagnostico","diag_Tipificacion1");
        //echo $sql;
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['diag_Cod_diagnostico'] . "'>" . $row['diag_Tipificacion1'] . "</option>") . "\n";
        }
    }
    //diag_Cod_diagnostico  diag_Tipificacion1 - SEGMENTO
    if (isset($_POST['diag_Cod_diagnostico']) and (isset($_POST['diag_Tipificacion1'])) and (isset($_POST['Segmento']))) {
        $sql = "SELECT diag_Tipificacion1,diag_Tipificacion1 FROM diagnostico WHERE diag_Pertenece='Catalogo_diagnostico' and diag_Tipificacion4 like '%".$_POST['diag_Cod_diagnostico']."%' GROUP BY diag_Tipificacion1";
        $datos = consulta($sql,"diag_Tipificacion1","diag_Tipificacion1");
        //echo $sql;
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['diag_Tipificacion1'] . "'>" . $row['diag_Tipificacion1'] . "</option>") . "\n";
        }
    }
    //diag_Tipificacion1 - CAUSA RAIZ
    if (isset($_POST['diag_Cod_diagnostico']) and (isset($_POST['diag_Tipificacion1'])) and (isset($_POST['Causa_Raiz']))) {
        $sql = "SELECT diag_Cod_diagnostico,diag_Tipificacion2 FROM diagnostico WHERE diag_Pertenece='Catalogo_diagnostico' and diag_Tipificacion1 ='".$_POST['diag_Tipificacion1']."' and diag_Tipificacion4 like '%".$_POST['diag_Cod_diagnostico']."%'";
        $datos = consulta($sql,"diag_Cod_diagnostico","diag_Tipificacion2");
        //echo $sql;
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['diag_Cod_diagnostico'] . "'>" . $row['diag_Tipificacion2'] . "</option>") . "\n";
        }
    }
    //diag_Tipificacion1 - ESTADO
    if (isset($_POST['diag_Cod_diagnostico'])  and (isset($_POST['crm_Tipificacion']))) {
        $sql = "SELECT diag_Cod_diagnostico,diag_Tipificacion1 FROM diagnostico WHERE diag_Pertenece='Estado' and diag_Tipificacion4 like '%".$_POST['diag_Cod_diagnostico']."%'";
        $datos = consulta($sql,"diag_Cod_diagnostico","diag_Tipificacion1");
        //echo $sql;
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['diag_Cod_diagnostico'] . "/".$row['diag_Tipificacion1']."'>" . $row['diag_Tipificacion1'] . "</option>") . "\n";
        }
    }
    //diag_Tipificacion1 - CATEGORIA CIERRE
    if (isset($_POST['diag_Cod_diagnostico'])  and (isset($_POST['crm_CategoriaCierre']))) {
        $sql = "SELECT diag_Cod_diagnostico,diag_Tipificacion1 FROM diagnostico WHERE diag_Tipificacion4 like '%".$_POST['diag_Cod_diagnostico']."%' and diag_Pertenece='Categoria cierre'";
        $datos = consulta($sql,"diag_Cod_diagnostico","diag_Tipificacion1");
        //echo $sql;
        foreach ($datos as $row) {
            echo utf8_encode("<option value='" . $row['diag_Cod_diagnostico'] . "'>" . $row['diag_Tipificacion1'] . "</option>") . "\n";
        }
    }
}


function consulta($sql,$val,$text){
    $con = new \Models\Conexion();
    $c = $con->getConexion();
    $statement = $c->prepare($sql);
    if ($statement->execute()) ;
    while ($result = $statement->fetch()) {
        $datos[] = $result;
    }
    if (empty($datos)){
        $datos = array();
    }else{
        $datos = llenar_listaU($datos,$val,$text);
    }
    return $datos;
}


function llenar_listaU($var,$val,$tex){
    try {
        $sel = array();
        $desc = array($val,$tex);
        foreach ($desc as $key => &$v){
            $sel = $sel + array($v=>'- Seleccione - ');
        }
        //print_r($sel);

        array_unshift($var,$sel);
        //print_r($var);
        return $var;
    } catch (\Exception $e) {
        throw $e;
    }
}

?>
