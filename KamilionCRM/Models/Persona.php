<?php namespace Models;

    use Lib\etCRM;

class Persona{

        /*    *Atributos*    */
        private $per_codigo ;
        private $Complemento_Admin_ca_id;
        private $Cargo_carg_id;
        private $per_documento;
        private $per_tipoDocumento;
        private $per_nombre;
        private $per_apellidos;
        private $per_telefono;
        private $per_celular;
        private $per_direccion;
        private $per_correo;
        private $per_profesion;
        private $per_fechaNacimiento;
        private $per_genero;
        private $per_rutaFoto;
        private $per_estado;
        private $atributos = array("per_codigo","Complemento_Admin_ca_id","Cargo_carg_id","per_documento","per_tipoDocumento","per_nombre","per_apellidos","per_telefono","per_celular","per_direccion","per_correo","per_profesion","per_fechaNacimiento","per_genero","per_rutaFoto","per_estado");
        private $var;


    //Constructor
    public function __construct(){
        $this->con = new etCRM();
    }

    //Metodo set
    public function set($atributo,$contenido){
      $this->$atributo = $contenido;
    }
    //Metodo get
    public function get($atributo){
      return $this->$atributo;
    }
    //Buscar Todo
    public function listar(){
        try{
            $datos = $this->con->select("Personal");
            return $datos;
        }catch (\Exception $exception){
            throw $exception;
        }
    }
    //insertar
    public function add(){
      try {
        $this->param = $this->validarAtributos();
        $this->con->insert("Personal",$this->param);

      } catch (\Exception $exception) {

      }

    }
    //Eliminar
    public function remove(){

    }
    //Actualizar
    public function edit(){
        try {
            $this->param = $this->validarAtributos();
            $a = array("per_codigo"=>array_shift($this->param));
            $this->con->update("Personal",$this->param,$a);
        } catch (\Exception $exception) {

        }
    }
    //Buscar por filtro
    public function view(){
        try{
            $this->param = $this->validarAtributos();
            $datos = $this->con->select("Personal",null,$this->param);
            return $datos;
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    public function validarAtributos(){
        foreach ($this->atributos as $v){
            if(!empty($this->get($v))){
                $this->var[$v] = $this->get($v);
            }
        }
        if (empty($this->var)){
            $this->var = null;
        }
        return $this->var;
    }
  }
 ?>