<?php namespace Models;

  use Lib\etCRM;

class CrmInbound{


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
    private $crm_TPQR;
    private $crm_Equipo;
    private $crm_Barrio;
    private $crm_Inconsistencia;
    private $atributos = array("crm_id", "Division_Politica_divp_if", "Inbound_inb_Caso", "Usuarios_usu_id", "crm_FechaRegistro", "crm_Servicio", "crm_Solicitud", "crm_CausaRaiz", "crm_CategoriaCierre", "crm_Tipificacion", "crm_Observacion", "crm_MinAlterno", "crm_Escalamiento", "crm_FechaProgra", "crm_PQR", "crm_TPQR", "crm_Equipo", "crm_Barrio", "crm_Inconsistencia");
    private $var;


    //Constructor
    public function __construct(){
        try {
            $this->con = new etCRM();
        } catch (\Exception $exception) {

        }
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
        try {
            $this->param = $this->validarAtributos();
            //print_r($this->param);
            $this->con->insert("crm_inbound", $this->param);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Buscar Todo
    public function buscarGestiones(){
        try{
            $this->param = $this->validarAtributos();
            $datos = $this->con->select("crm_inbound",null,$this->param);
            return $datos;
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    //Eliminar
    public function delete(){

    }
    //Actualizar
    public function edit(){

    }
    //Buscar por filtro
    public function view(){

    }

      public function validarAtributos()
      {
          foreach ($this->atributos as $v) {
              if (!empty($this->get($v))) {
                  $this->var[$v] = $this->get($v);
              }
          }
          if (empty($this->var)) {
              $this->var = null;
          }
          return $this->var;
      }
  }

 ?>
