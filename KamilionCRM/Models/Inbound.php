<?php namespace Models;

  class Inbound{

    /*    *Atributos*    */
    private $inb_Caso;
    private $Usuarios_usu_id;
    private $inb_IdLlamada;
    private $inb_FechaIngreso;
    private $inb_Estado;
    private $inb_NombreCliente;
    private $inb_MinCliente;
    private $inb_MinAlternoCliente;
    private $inb_Ciudad;
    private $inb_UsuarioReporta;

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
      $sql = "SELECT * FROM inbound";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO inbound(inb_Caso, Usuarios_usu_id, inb_IdLlamada, inb_FechaIngreso, inb_Estado, inb_NombreCliente, inb_MinCliente, inb_MinAlternoCliente, inb_Ciudad, inb_UsuarioReporta) VALUES (null,'','','','','','','','','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM inbound WHERE inb_Caso='{$this->inb_Caso}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE inbound SET Usuarios_usu_id='',inb_IdLlamada='',inb_FechaIngreso='',inb_Estado='',inb_NombreCliente='',inb_MinCliente='',inb_MinAlternoCliente='',inb_Ciudad='',inb_UsuarioReporta='' WHERE inb_Caso='{$this->inb_Caso}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM inbound WHERE inb_caso='{$this->inb_Caso}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
