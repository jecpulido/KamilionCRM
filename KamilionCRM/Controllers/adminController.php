<?php namespace Controllers;

//use Lib\Filtro as Filtro;
use Models\Cargo;
use Models\Persona;
class adminController{

    /*    *Atributos*    */
		private $persona;
		private $perfil;
		private $cargo;
		private $complementoDatos;
        /*    *Metodos*    */
    //Constructor
		public function __construct(){
          try {
            $this->persona = new Persona();
            $this->cargo = new Cargo();
          } catch (\Exception $e) {

          }
		}

		public function index(){
            $datos = $this->cargarlista();
            return $datos ;
		}

		public function agregarPersona(){

            if(!$_POST){
                $datos = $this->cargarlista();
                return $datos ;
            }else{

                $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
                $limite = 700;
                if(in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite * 1024){
                    $ext = explode(".", $_FILES['foto']['name']);
                    $nombre = $_POST['per_codigo'].".".$ext[1];
                    $ruta = "Views" . DS . "template". DS . "imagenes" . DS . "avatars" . DS . $nombre;
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
                    header("Location: " . URL . "admin");
                }else{
                    //echo "Tipo de archivo no valido";
                }
            }
		}

		public function listarPersona(){

		}

		public function cargarlista(){
            $perfil = $this->cargo->listar();
            $datos= array($perfil);
            return $datos;
        }
	}
?>