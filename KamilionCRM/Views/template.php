<?php namespace Views;

use Lib\Session;

$template = new Template();

class Template{

    public function __construct(){
            session_start();
            $ruta = $_SERVER['REQUEST_URI'];
            $ruta=explode("/", $ruta);
            //print_r($ruta);
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>

                <?php include TEMPLATE . "head.php"; ?>
            </head>
            <body>
            <?php if (!in_array("login", $ruta)){
            include TEMPLATE . "menu.php"; ?>
            <div id="page-wrapper">
            <?php
        }

    }

    public function __destruct(){
        $ruta = $_SERVER['REQUEST_URI'];
        $ruta=explode("/", $ruta);
        if (!in_array("login", $ruta)) {
            ?>
            </div>
            <?php } include TEMPLATE . "scripts.php"; ?>
            </body>
            </html>
            <?php

    }

}
?>