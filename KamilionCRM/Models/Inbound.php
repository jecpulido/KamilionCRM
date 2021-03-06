<?php namespace Models;

use Lib\etCRM;

class Inbound
{


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
    private $atributos = array("inb_Caso", "Usuarios_usu_id", "inb_IdLlamada", "inb_FechaIngreso", "inb_Estado", "inb_NombreCliente", "inb_MinCliente", "inb_MinAlternoCliente", "inb_Ciudad", "inb_UsuarioReporta");
    private $var;

    //Constructor
    public function __construct()
    {
        try {
            $this->con = new etCRM();
        } catch (\Exception $exception) {

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

    }

    //insertar
    public function add()
    {
        try {
            $this->param = $this->validarAtributos();
            //print_r($this->param);
            $this->con->insert("inbound", $this->param);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Eliminar
    public function delete()
    {

    }

    //Eliminar
    public function buscarCaso(){
        try{
            $this->param = $this->validarAtributos();
            $datos = $this->con->select("Inbound",null,$this->param);
            return $datos;
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    //Actualizar
    public function edit(){
        try {
            $this->param = $this->validarAtributos();
            //print_r($this->param);
            $a = array("inb_Caso"=>array_shift($this->param));
            $this->con->update("Inbound",$this->param,$a);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Buscar por filtro
    public function verPendientes(){
        try{
            $sql = "SELECT inbound.* FROM inbound  where inb_Estado<>'Cerrado' and inb_Estado NOT LIKE '%Esca%'";
            $datos = $this->con->selectAvanzado($sql,null);
            return $datos;
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    public function verSolicitado(){
        try{
            $sql = "SELECT  DATE(inb_FechaIngreso) as Fecha,COUNT(CASE WHEN inb_Estado='Seguimiento' THEN 1 ELSE NULL END ) AS 'Seguimiento',COUNT(CASE WHEN inb_Estado='Programado' THEN 1 ELSE NULL END) AS 'Programado',COUNT( CASE WHEN inb_Estado='No Contactado' THEN 1 ELSE NULL END ) AS 'No Contactado',COUNT( CASE WHEN inb_Estado='Solicitud Escalar SD' THEN 1 ELSE NULL END ) AS 'Solicitud Escalar SD',COUNT( CASE WHEN inb_Estado='Solicitud Escalar CPD' THEN 1 ELSE NULL END ) AS 'Solicitud Escalar CPD',COUNT( CASE WHEN inb_Estado='Cerrado' THEN 1 ELSE NULL END ) AS 'Cerrado', COUNT( CASE WHEN inb_Estado is NOT NULL THEN 1 ELSE NULL END ) AS 'Total' FROM inbound GROUP BY  DATE(inb_FechaIngreso)";
            $datos = $this->con->selectAvanzado($sql,null);
            return $datos;
        }catch (\Exception $exception){
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
