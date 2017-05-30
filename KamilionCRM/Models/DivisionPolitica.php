<?php namespace Models;

  use Lib\etCRM;
  use Lib\Filtro;

class DivisionPolitica{

    private $divp_id;
    private $divp_Region;
    private $divp_IdDepartamento;
    private $divp_Departamento;
    private $divp_IdCiudad;
    private $divp_Ciudad;
    private $atributos = array("divp_id", "divp_Region","divp_IdDepartamento","divp_Departamento","divp_IdCiudad","divp_Ciudad");
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

    public function listar(){

    }

    //Listar Marca
    public function listarDpto()
    {
        $sql = "select divp_IdDepartamento,divp_Departamento from division_politica group BY divp_Departamento,divp_IdDepartamento";
        $datos = $this->con->selectAvanzado($sql);
        //print_r($datos);
        $datos = Filtro::llenar_listaU($datos);
        return $datos;
    }

    //insertar
    public function add(){

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
