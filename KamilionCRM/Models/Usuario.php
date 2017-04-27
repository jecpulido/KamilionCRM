<?php namespace Models;

  class Usuario{

    /*    *Atributos*    */
    private $usu_id;
    private $Personal_per_codigo;
    private $Perfil_perf_id;
    private $usu_pass;
    private $usu_jefe;

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
      $sql = "SELECT * FROM usuarios";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO usuarios(usu_id, Personal_per_codigo, Perfil_perf_id, usu_pass, usu_jefe) VALUES ('','','','','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM usuarios WHERE usu_id='{$this->usu_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE usuarios SET usu_id='',Personal_per_codigo='',Perfil_perf_id='',usu_pass='',usu_jefe='' WHERE usu_id='{$this->usu_id}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM `usuarios` WHERE 1";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
