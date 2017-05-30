<?php
/**
 * Created by PhpStorm.
 * User: ECH2523A
 * Date: 26/05/2017
 * Time: 16:54
 */

namespace Models;

use Lib\etCRM;
use Lib\Filtro;
class EquipoStandar
{
    private $eq_equipo;
    private $eq_marca;
    private $atributos = array("eq_equipo", "eq_marca");
    private $var;

    //Constructor
    public function __construct()    {
        try{
            $this->con = new etCRM();
        }catch (\Exception $exception){

        }
    }

    //Metodo set
    public function set($atributo, $contenido)
    {
        $this->$atributo = $contenido;
    }

    //Metodo get
    public function get($atributo)
    {
        return $this->$atributo;
    }

    //Buscar Todo
    public function listar()
    {
        $this->param = $this->validarAtributos();
        $datos = $this->con->select("equipoStandar", null, $this->param);
        $datos = Filtro::llenar_lista($datos);
        return $datos;
    }

    //Listar Marca
    public function listarMarca()
    {
        $sql = "select eq_marca from equipostandar group BY eq_marca";
        $datos = $this->con->selectAvanzado($sql);
        //print_r($datos);
        $datos = Filtro::llenar_listaU($datos);
        return $datos;
    }

    //List Equipo
    public function listarEquipo($eq_marca)
    {
        $sql = "select eq_equipo from equipostandar where eq_marca=".$eq_marca;
        echo $sql;
        $datos = $this->con->selectAvanzado($sql);
        print_r($datos);
        $datos = Filtro::llenar_listaU($datos);
        return $datos;
    }
    //insertar
    public function add()
    {
        $this->param = $this->validarAtributos();
        $this->con->insert("equipoStandar", $this->param);
    }

    //Eliminar
    public function delete()
    {

    }

    //Actualizar
    public function edit()
    {

    }

    //Buscar por filtro
    public function view()
    {
        try {
            $this->param = $this->validarAtributos();
            $datos = $this->con->select("equipoStandar", null, $this->param);
            return $datos;
        } catch (\Exception $exception) {
            throw $exception;
        }
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
