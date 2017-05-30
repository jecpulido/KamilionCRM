<?php
include_once "Conexion.php";

if ($_POST){
    if (isset($_POST['inb_Caso'])) {
        $sql = "select inb_Caso from inbound where inb_Caso='" . $_POST['inb_Caso'] . "'";
        $datos = consulta($sql);
        //print_r($datos);
        if (empty($datos)){
            echo "";
        }else{
            echo $_POST['inb_Caso'];
        }
    }
    if (isset($_POST['inb_IdLlamada'])) {
        $sql = "select inb_IdLlamada from inbound where inb_IdLlamada='" . $_POST['inb_IdLlamada'] . "'";
        $datos = consulta($sql);
        //print_r($datos);
        if (empty($datos)){
            echo "";
        }else{
            echo $_POST['inb_IdLlamada'];
        }
    }
}

function consulta($sql){
    $con = new \Models\Conexion();
    $c = $con->getConexion();
    $statement = $c->prepare($sql);
    if ($statement->execute()) ;
    while ($result = $statement->fetch()) {
        $datos[] = $result;
    }
    if (empty($datos)){
        $datos = array();
    }
    return $datos;
}




?>