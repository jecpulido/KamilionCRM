<?php
/**
 * Created by PhpStorm.
 * User: ECH2523A
 * Date: 11/05/2017
 * Time: 17:30
 */

namespace Controllers;
//include "../Lib/core.php";
//include_once "../Lib/Filtro.php";
//include_once "../Models/Usuario.php";
use Lib\Filtro as Filtro;
use Models\Usuario as Usuario;

$usuario = new Usuario();

session_start();
// Store Session Data
if (isset($_SESSION['usu_id'])){
    header("Location:../index.php");
}else{
    if (!empty($_POST)){
        $usu_id = filter_input(INPUT_POST, $_POST['usu_id'], FILTER_SANITIZE_STRING);
        $usu_pass =  Filtro::encriptar($_POST['usu_pass']);
        $error ="";
        $usuario->set("usu_id",$usu_id);
        $usuario->set("usu_id",$usu_id);
        $datos = $usuario->view();
        print_r($datos);


    }
}
