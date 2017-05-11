<?php
/**
 * Created by PhpStorm.
 * User: ECH2523A
 * Date: 11/05/2017
 * Time: 17:30
 */

namespace Controllers;
include_once "../Lib/Filtro.php";
use Lib\Filtro as Filtro;

session_start();
// Store Session Data
if (isset($_SESSION['usu_id'])){
    header("Location:../index.php");
}else{
    if (isset($_POST)){
            echo $_POST['usu_id']."<br>";
            //echo $_POST['usu_pass']."<br>";
            echo Filtro::desencriptar(Filtro::encriptar($_POST['usu_pass']));

    }
}
