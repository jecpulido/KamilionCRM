<?php namespace Controllers;

use Lib\Filtro as Filtro;
use Lib\Redirecciona;
use Lib\Session;
use Models\Cargo;
use Models\ComplementoAdmin;
use Models\Perfil;
use Models\Persona;
use Models\Usuario;

class adminController
{

    /*    *Atributos*    */
    private $persona;
    private $perfil;
    private $cargo;
    private $complementoDatos;
    private $complementoAdmin;
    private $usuario;

    //Constructor
    public function __construct()
    {
        try {

            $this->persona = new Persona();
            $this->cargo = new Cargo();
            $this->complementoAdmin = new ComplementoAdmin();
            $this->usuario = new Usuario();
            $this->perfil = new Perfil();
        } catch (\Exception $e) {

        }
    }

    public function index()
    {
        //session_start();
        //echo $_SESSION['Personal_per_codigo'];
        $this->persona->set("per_codigo", $_SESSION['Personal_per_codigo']);
        $datos = $this->persona->view();
        foreach ($datos as $row) {
            $datos = $row;
            return $datos;
        }
    }

    public function agregarPersona()
    {
        try {
            if (!$_POST) {
                $datos = $this->cargarlista();
                return $datos;
            } else {
                $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
                $limite = 700;
                if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite * 1024) {
                    $ext = explode(".", $_FILES['foto']['name']);
                    $nombre = $_POST['per_codigo'] . "." . $ext[1];
                    $ruta = "Views" . DS . "template" . DS . "imagenes" . DS . "avatars" . DS . $nombre;
                    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
                    $this->persona->set("per_codigo", $_POST['per_codigo']);
                    $this->persona->set("Complemento_Admin_ca_id", $_POST['Complemento_Admin_ca_id']);
                    $this->persona->set("Cargo_carg_id", $_POST['Cargo_carg_id']);
                    $this->persona->set("per_documento", $_POST['per_documento']);
                    $this->persona->set("per_tipoDocumento", $_POST['per_tipoDocumento']);
                    $this->persona->set("per_nombre", ($_POST["per_nombre"]));
                    $this->persona->set("per_apellidos", $_POST['per_apellidos']);
                    $this->persona->set("per_telefono", $_POST['per_telefono']);
                    $this->persona->set("per_celular", $_POST['per_celular']);
                    $this->persona->set("per_direccion", $_POST['per_direccion']);
                    $this->persona->set("per_correo", $_POST['per_correo']);
                    $this->persona->set("per_profesion", $_POST['per_profesion']);
                    $this->persona->set("per_fechaNacimiento", $_POST['per_fechaNacimiento']);
                    $this->persona->set("per_genero", $_POST['per_genero']);
                    $this->persona->set("per_rutaFoto", $nombre);
                    $this->persona->set("per_estado", 1);
                    $this->persona->add();
                    header("Location: " . URL . "admin/listarPersona");
                } else {
                    //echo "Tipo de archivo no valido";
                }
            }
        } catch (\Exception $exception) {

        }
    }

    public function editarPersona($codigo)
    {
        try {
            if (!$_POST) {
                $this->persona->set("per_codigo", $codigo);
                $persona = $this->persona->view();
                $datos = $this->cargarlista();
                $datos = array("persona" => $persona[0]) + $datos;
                return $datos;
            } else {
                $this->persona->set("per_codigo", $_POST['per_codigo']);
                $this->persona->set("Complemento_Admin_ca_id", $_POST['Complemento_Admin_ca_id']);
                $this->persona->set("Cargo_carg_id", $_POST['Cargo_carg_id']);
                $this->persona->set("per_tipoDocumento", $_POST['per_tipoDocumento']);
                $this->persona->set("per_nombre", ($_POST["per_nombre"]));
                $this->persona->set("per_apellidos", $_POST['per_apellidos']);
                $this->persona->set("per_telefono", $_POST['per_telefono']);
                $this->persona->set("per_celular", $_POST['per_celular']);
                $this->persona->set("per_direccion", $_POST['per_direccion']);
                $this->persona->set("per_correo", $_POST['per_correo']);
                $this->persona->set("per_profesion", $_POST['per_profesion']);
                $this->persona->set("per_fechaNacimiento", $_POST['per_fechaNacimiento']);
                $this->persona->set("per_genero", $_POST['per_genero']);
                $this->persona->set("per_estado", $_POST['per_estado']);
                $this->persona->edit();
                header("Location: " . URL . "admin/listarPersona");
            }
        } catch (\Exception $exception) {

        }
    }

    public function listarPersona()
    {
        try {
            $datos = $this->persona->listar();
            return $datos;
        } catch (\Exception $exception) {

        }
    }

    public function verPersona($codigo)
    {
        try {
            $this->persona->set("per_codigo", $codigo);
            $datos = $this->persona->view();
            foreach ($datos as $row) {
                $datos = $row;
                return $datos;
            }

        } catch (\Exception $exception) {

        }
    }

    public function agregarUsuario($codigo)
    {
        try {
            if (!$_POST) {
                $perfil = $this->perfil->listar();
                //print_r($perfil);
                $this->persona->set("per_codigo", $codigo);
                $datos = $this->persona->view();
                foreach ($datos as $row) {
                    $datos = $row;
                }
                $datos = array("persona" => $datos, "perfil" => $perfil);
                //print_r($datos);
                return $datos;
            } else {
                $this->usuario->set("usu_id", $_POST['usu_id']);
                $this->usuario->set("Personal_per_codigo", $_POST['Personal_per_codigo']);
                $this->usuario->set("Perfil_perf_id", $_POST['Perfil_perf_id']);
                $this->usuario->set("usu_jefe", $_POST['usu_jefe']);
                if ($_POST['usu_pass'] === $_POST['usu_pass2']) {
                    $this->usuario->set("usu_pass", Filtro::encriptar($_POST['usu_pass']));
                } else {
                    throw new \Exception("Las Contraseñas no coinciden");
                }
                $this->usuario->add();
                header("Location: " . URL . "admin/listarUsuario");
            }
        } catch (\Exception $exception) {

        }
    }

    public function listarUsuario()
    {
        if (!$_POST) {
            $ususin = $this->usuario->sinUsu();
            $usucon = $this->usuario->conUsu();
            $datos = array("sin" => $ususin, "con" => $usucon);
            return $datos;
        }
    }

    public function editarUsuario($codigo)
    {
        try {
            if (!$_POST) {
                $perfil = $this->perfil->listar();
                $this->persona->set("per_codigo", $codigo);
                $persona = $this->persona->view();
                $this->usuario->set("Personal_per_codigo", $codigo);
                $usuario = $this->usuario->view();
                $datos = array("usuario" => $usuario[0], "perfil" => $perfil, "persona" => $persona[0]);
                //print_r($datos);
                return $datos;
            } else {
                //print $_SESSION['usu_id'];
                $this->usuario->set("usu_id", $_POST['usu_id']);
                $this->usuario->set("Personal_per_codigo", $_POST['Personal_per_codigo']);
                $this->usuario->set("Perfil_perf_id", $_POST['Perfil_perf_id']);
                $this->usuario->set("usu_jefe", $_POST['usu_jefe']);
                if ($_POST['usu_pass'] === $_POST['usu_pass2']) {
                    $this->usuario->set("usu_pass", Filtro::encriptar($_POST['usu_pass']));
                } else {
                    throw new \Exception("Las Contraseñas no coinciden");
                }
                $this->usuario->edit();
                header("Location: " . URL . "admin/listarUsuario");
            }
        } catch (\Exception $exception) {
            $_SESSION['Error'] = $exception->getMessage();
        }
    }

    public function cargarlista()
    {
        $perfil = $this->cargo->listar();
        $this->complementoAdmin->set("ca_estado", "1");
        $this->complementoAdmin->set("ca_grupo", "tipoDocumento");
        $tipoDocumento = $this->complementoAdmin->listar();
        $this->complementoAdmin->set("ca_grupo", "genero");
        $genero = $this->complementoAdmin->listar();
        $this->complementoAdmin->set("ca_grupo", "estadoCivil");
        $estadoCivil = $this->complementoAdmin->listar();
        $datos = array("perfil" => $perfil, "tipoDocumento" => $tipoDocumento, "genero" => $genero, "estadoCivil" => $estadoCivil);
        return $datos;
    }
}

?>