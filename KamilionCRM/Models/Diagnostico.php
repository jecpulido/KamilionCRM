<?php namespace Models;

  use Lib\etCRM;
use Lib\Filtro;

class Diagnostico{


    private $diag_id;
    private $diag_Tipificacion1;
    private $diag_Tipificacion2;
    private $diag_Tipificacion3;
    private $diag_Tipificacion4;
    private $diag_Cod_diagnostico;
    private $diag_Pertenece;
    private $atributos = array("diag_id", "diag_Tipificacion1", "diag_Tipificacion2", "diag_Tipificacion3", "diag_Tipificacion4", "diag_Cod_diagnostico", "diag_Pertenece");
    private $var;

    //Constructor
    public function __construct(){
      try{
        $this->con = new etCRM();
      }catch (\Exception $exception){

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
    public function listar(){}

    //insertar
    public function add(){}

    //Eliminar
    public function delete(){}

    //Actualizar
    public function edit(){}

    //Buscar por filtro
    public function view(){}

    public function listarLineaServicio(){
        $sql = "SELECT diag_Tipificacion1 FROM diagnostico WHERE diag_Pertenece='servicio1' GROUP BY diag_Tipificacion1";
        $datos = $this->con->selectAvanzado($sql);
        //print_r($datos);
        $datos = Filtro::llenar_listaU($datos);
        return $datos;
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
