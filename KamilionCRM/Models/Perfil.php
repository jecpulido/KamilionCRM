<?php namespace Models;

  class Perfil{

    /*    *Atributos*    */
    private $perf_id;
    private $perf_descripcion;
    private $perf_permisos;

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
      $sql = "SELECT * FROM perfil";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO perfil(perf_id, perf_descripcion, perf_permisos) VALUES (null,'','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM perfil WHERE perf_id='{$this->perf_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE perfil SET perf_descripcion='',perf_permisos='' WHERE perf_id='{$this->perf_id}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM perfil WHERE perf_id='{$this->perf_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
