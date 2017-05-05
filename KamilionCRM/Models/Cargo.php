<?php namespace Models;

  use Lib\Filtro;

class Cargo{

    /*    *Atributos*    */
    private $carg_id;
    private $carg_descripcion;
    private $carg_seccion;
    private $atributos = array("carg_id","carg_descripcion","carg_seccion");
    private $var;

    /*    *Metodos*    */
    //Constructor
    public function __construct(){
        $this->con = new \lib\etCRM();
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
        $this->param = $this->validarAtributos();
        $datos = $this->con->select("Cargo",null,$this->param);
        $datos = Filtro::llenar_lista($datos);
        //print_r($datos);
        return $datos;
    }
    //insertar
    public function add(){

    }
    //Eliminar
    public function delete(){

    }
    //Actualizar
    public function edit(){

    }
    //Buscar por filtro
    public function view(){

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