<?php namespace Models;

  class FallaService{

    /*    *Atributos*    */
    private $fallas_id;
    private $Inbound_inb_Caso;
    private $Usuarios_usu_id;
    private $fallas_FechaRegistro;
    private $fallas_SD;
    private $fallas_EstadoSD;
    private $fallas_ObservacionSD;
    private $fallas_TipoFalla;
    private $fallas_APN;

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
      $sql = "SELECT * FROM falla_servicio";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO falla_servicio(fallas_id, Inbound_inb_Caso, Usuarios_usu_id, fallas_FechaRegistro, fallas_SD, fallas_EstadoSD, fallas_ObservacionSD, fallas_TipoFalla, fallas_APN) VALUES (null,'','','','','','','','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM falla_servicio WHERE fallas_id='{$this->fallas_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE falla_servicio SET Inbound_inb_Caso='',Usuarios_usu_id='',fallas_FechaRegistro='',fallas_SD='',fallas_EstadoSD='',fallas_ObservacionSD='',fallas_TipoFalla='',fallas_APN='' WHERE fallas_id ={$this->fallas_id}";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM falla_servicio WHERE fallas_id='{$this->fallas_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
