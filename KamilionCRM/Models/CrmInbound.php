<?php namespace Models;

  class CrmInbound{

    /*    *Atributos*    */
    private $crm_id;
    private $Division_Politica_divp_if;
    private $Inbound_inb_Caso;
    private $Usuarios_usu_id;
    private $crm_FechaRegistro;
    private $crm_Servicio;
    private $crm_Solicitud;
    private $crm_CausaRaiz;
    private $crm_CategoriaCierre;
    private $crm_Tipificacion;
    private $crm_Observacion;
    private $crm_MinAlterno;
    private $crm_Escalamiento;
    private $crm_FechaProgra;
    private $crm_PQR;
    private $crm_Equipo;
    private $crm_Barrio;
    private $crm_Inconsistencia;

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
      $sql = "SELECT * FROM crm_inbound";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO crm_inbound(Division_Politica_divp_if, Inbound_inb_Caso, Usuarios_usu_id, crm_FechaRegistro, crm_Servicio, crm_Solicitud, crm_CausaRaiz, crm_CategoriaCierre, crm_Tipificacion, crm_Observacion, crm_MinAlterno, crm_Escalamiento, crm_FechaProgra, crm_PQR, crm_Equipo, crm_Barrio, crm_Inconsistencia) VALUES ('','','','','','','','','','','','','','','','','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM crm_inbound WHERE crm_id='{$this->crm_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE crm_inbound SET Division_Politica_divp_if='',Inbound_inb_Caso='',Usuarios_usu_id='',crm_FechaRegistro='',crm_Servicio='',crm_Solicitud='',crm_CausaRaiz='',crm_CategoriaCierre='',crm_Tipificacion='',crm_Observacion='',crm_MinAlterno='',crm_Escalamiento='',crm_FechaProgra='',crm_PQR='',crm_Equipo='',crm_Barrio='',crm_Inconsistencia='' WHERE crm_id='{$this->crm_id}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM `crm_inbound` WHERE crm_id='{$this->crm_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
