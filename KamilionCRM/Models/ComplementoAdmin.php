<?php namespace Models;

use Lib\etCRM;
use Lib\Filtro;

  class ComplementoAdmin{

    private $ca_id;
    private $ca_descripcion;
    private $ca_grupo;
    private $ca_estado;
    private $atributos = array("ca_id","ca_descripcion","ca_grupo","ca_estado");
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
          $this->param = $this->validarAtributos();
          $datos = $this->con->select("complemento_admin",null,$this->param);
          $datos = Filtro::llenar_lista($datos);
          return $datos;
      }
      //insertar
      public function add(){
          $this->param = $this->validarAtributos();
          $this->con->insert("complemento_admin",$this->param);
      }

      //Eliminar
      public function delete(){

      }
      //Actualizar
      public function edit(){

      }
      //Buscar por filtro
      public function view(){
          try{
              $this->param = $this->validarAtributos();
              $datos = $this->con->select("complemento_admin",null,$this->param);
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
