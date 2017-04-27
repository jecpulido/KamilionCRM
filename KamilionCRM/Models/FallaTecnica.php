<?php namespace Models;

  class FallaTecnica{

    /*    *Atributos*    */
    private $fallat_id;
    private $Division_Politica_divp_if;
    private $Inbound_inb_Caso;
    private $Usuarios_usu_id;
    private $fallat_Cliente;
    private $fallat_minContacto;
    private $fallat_Tiempo;
    private $fallat_Tipo;
    private $fallat_FechaRegistro;
    private $fallat_Vereda;
    private $falat_Direccion;
    private $fallat_Barrio;
    private $fallat_Coordenada;
    private $fallat_Equipo;
    private $fallat_Cpd;
    private $fallat_EstadoCpd;
    private $fallat_ObsCpd;
    private $fallat_FechaCpd;

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
      $sql = "SELECT * FROM falla_tecnica";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO falla_tecnica(fallat_id, Division_Politica_divp_if, Inbound_inb_Caso, Usuarios_usu_id, fallat_Cliente, fallat_minContacto, fallat_Tiempo, fallat_Tipo, fallat_FechaRegistro, fallat_Vereda, falat_Direccion, fallat_Barrio, fallat_Coordenada, fallat_Equipo, fallat_Cpd, fallat_EstadoCpd, fallat_ObsCpd, fallat_FechaCpd) VALUES (null,'','','','','','','','','','','','','','','','','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM falla_tecnica WHERE fallat_id='{$this->fallat_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE falla_tecnica SET fallat_id='',Division_Politica_divp_if='',Inbound_inb_Caso='',Usuarios_usu_id='',fallat_Cliente='',fallat_minContacto='',fallat_Tiempo='',fallat_Tipo='',fallat_FechaRegistro='',fallat_Vereda='',falat_Direccion='',fallat_Barrio='',fallat_Coordenada='',fallat_Equipo='',fallat_Cpd='',fallat_EstadoCpd='',fallat_ObsCpd='',fallat_FechaCpd='' WHERE fallat_id='{$this->fallat_id}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM falla_tecnica WHERE fallat_id='{$this->fallat_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
