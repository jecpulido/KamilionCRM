<?php namespace Models;

  class ComplementoDatos{

    /*    *Atributos*    */
    private $comd_id;
    private $comd_Descripcion;
    private $comd_Pertenece;

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
      $sql = "SELECT * FROM complemento_datos ";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO complemento_datos(comd_id, comd_Descripcion, comd_Pertenece) VALUES (null,'','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM complemento_datos WHERE comd_id='{$this->comd_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE complemento_datos SET comd_Descripcion='',comd_Pertenece='' WHERE comd_id='{$this->comd_id}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM complemento_datos WHERE comd_id='{$this->comd_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
