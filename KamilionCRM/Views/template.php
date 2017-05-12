<?php namespace Views;

$template = new Template();

class Template{

    public function __construct(){

            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <?php include TEMPLATE . "head.php"; ?>
            </head>
            <body>
            <?php if (isset($_SESSION['usu_id'])){ include TEMPLATE . "menu.php";?>
            <div id="page-wrapper">
            <?php
                }

    }

    public function __destruct(){
        ?>
        </div>

        <?php include TEMPLATE."scripts.php"; ?>
        </body>
        </html>
        <?php
    }

}
?>