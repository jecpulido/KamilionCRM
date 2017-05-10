<?php namespace Models;

use Lib\etCRM;
  class Usuario{



    private $usu_id;
    private $Personal_per_codigo;
    private $Perfil_perf_id;
    private $usu_pass;
    private $usu_jefe;
    private $atributos = array("usu_id","Personal_per_codigo","Perfil_perf_id","usu_pass","usu_jefe");
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
    public function sinUsu(){
        try{
            $sql = "SELECT * FROM personal LEFT JOIN usuarios on per_codigo= Personal_per_codigo INNER JOIN cargo on Cargo_carg_id=carg_id where usu_id is null";
            $datos = $this->con->selectAvanzado($sql,null);
            return $datos;
        }catch (\Exception $exception){
            throw $exception;
        }
    }
      public function conUsu(){
          try{
              $sql = "SELECT * FROM personal INNER JOIN usuarios on per_codigo= Personal_per_codigo INNER JOIN cargo on Cargo_carg_id=carg_id ";
              $datos = $this->con->selectAvanzado($sql,null);
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
