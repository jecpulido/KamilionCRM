<?php namespace Models;

  class ComplementoAdmin{

    /*    *Atributos*    */
    private $ca_id;
    private  $ca_descripcion;
    private  $ca_estado;

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
      $sql = "SELECT * FROM complemento_admin";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO complemento_admin(ca_id, ca_descripcion, ca_estado) VALUES (null,'','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM complemento_admin WHERE ca_id='{$this->ca_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE complemento_admin SET ca_descripcion='',ca_estado='' WHERE ca_id='{$this->ca_id}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM complemento_admin WHERE ca_id='{$this->ca_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
