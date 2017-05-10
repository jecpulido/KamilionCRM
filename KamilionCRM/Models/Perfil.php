<?php namespace Models;



use Lib\etCRM;
use Lib\Filtro;
class Perfil{

    /*    *Atributos*    */
    private $perf_id;
    private $perf_descripcion;
    private $perf_permisos;
    private $atributos = array("perf_id","perf_descripcion","perf_permisos");
    private $var;


    //Constructor
    public function __construct(){
        $this->con = new etCRM();
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
        $this->param = $this->validarAtributos();
        $datos = $this->con->select("perfil",null,$this->param);
        $datos = Filtro::llenar_lista($datos);
        return $datos;
    }
    //insertar
    public function add(){
        $this->param = $this->validarAtributos();
        $this->con->insert("perfil",$this->param);
    }

    //Eliminar
    public function delete(){

    }
    //Actualizar
    public function edit(){

    }
    //Buscar por filtro
    public function view(){
        try{
            $this->param = $this->validarAtributos();
            $datos = $this->con->select("perfil",null,$this->param);
            return $datos;
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    public function validarAtributos(){
        foreach ($this->atributos as $v){
            if(!empty($this->get($v))){
                $this->var[$v] = $this->get($v);
            }
        }
        if (empty($this->var)){
            $this->var = null;
        }
        return $this->var;
    }
}

?>
