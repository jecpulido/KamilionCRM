<?php namespace Controllers;

use Models\Usuario;
use Lib\Filtro as Filtro;
use Lib\Redirecciona as Redirecciona;
use Views\Template;

class loginController{

    /*    *Atributos*    */
    private $usuario;
    private $tem;
    /*    *Metodos*    */
    //Constructor
    public function __construct(){
        $this->usuario = new Usuario();
    }

    public function index(){
        try{
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["Error"]="";
            if (isset($_SESSION['usu_id'])){
                Redirecciona::to("admin/");
            }
            if ($_POST){
                // Store Session Data
                if (isset($_SESSION['usu_id'])){
                    Redirecciona::to("admin/");
                }else{
                   // if (!empty($_POST)){

                        if (empty($_POST['usu_id'])){
                            throw new \Exception("Ingrese un usuario");
                        }else{
                            $usu_id= filter_var($_POST['usu_id'], FILTER_SANITIZE_STRING);
                        }
                        if (empty($_POST['usu_pass'])){
                            throw new \Exception("Ingrese una Contraseña");
                        }else{
                            $usu_pass =  Filtro::encriptar($_POST['usu_pass']);
                        }
                        //echo $usu_pass."<br>".$usu_id;
                        $this->usuario->set("usu_id",$usu_id);
                        $this->usuario->set("usu_pass",$usu_pass);
                        $datos = $this->usuario->view();
                        if(!empty($datos)){
                            //print_r($datos);

                            $_SESSION['usu_id'] = $datos[0]['usu_id'];
                            $_SESSION['Personal_per_codigo'] = $datos[0]['Personal_per_codigo'];
                            $_SESSION['Perfil_perf_id'] = $datos[0]['Perfil_perf_id'];
                            Redirecciona::to("index.php");
                            //echo $_SESSION['usu_id'];
                            //header("Location:".URL."/admin");
                        }else{
                            throw new \Exception("Usuario/Password incorrectos");

                        }
                        //print_r($datos);
                    //}
                }
            }
        }catch (\Exception $exception){
            $_SESSION['Error'] = $exception->getMessage();
        }

    }

    public function logout(){
        try{
            session_start();

	        unset ($_SESSION['usu_id']);
	        session_destroy();
            Redirecciona::to("");
        }catch (\Exception $exception){

        }
    }

    public function editar(){

    }

    public function eliminar(){

    }
}
?>

