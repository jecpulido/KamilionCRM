<?php namespace Models;

  class Cargo{

    /*    *Atributos*    */
    private $carg_id;
    private $carg_descripcion;
    private $carg_seccion;

    /*    *Metodos*    */
    //Constructor
    public function __construct(){

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
      $sql = "SELECT * FROM cargo";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO cargo(carg_id, carg_descripcion, carg_seccion) VALUES (null,'{$this->carg_descripcion}','{$this->carg_seccion}');";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM cargo WHERE carg_id = '{$this->carg_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE cargo SET carg_descripcion='',carg_seccion='' WHERE carg_id =''";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM cargo WHERE carg_id='{$this->carg_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
