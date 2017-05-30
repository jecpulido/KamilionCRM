<?php namespace Controllers;

use Lib\Filtro;
use Models\CrmInbound;
use Models\Diagnostico;
use Models\DivisionPolitica;
use Models\EquipoStandar;
use Models\Inbound;

class inboundController
{
    private $equipo;

    //Constructor
    public function __construct()
    {
        try {
            $this->equipo = new EquipoStandar();
            $this->division = new DivisionPolitica();
            $this->diagnostico = new Diagnostico();
            $this->inbound = new Inbound();
            $this->crmInbound = new CrmInbound();
        } catch (\Exception $exception) {

        }
    }

    public function index(){
        try{
            $datos = $this->inbound->verPendientes();
            return $datos;
        }catch (\Exception $exception){
            $_SESSION["Error"] = $exception->getMessage();
        }
    }

    public function registroInbound()
    {
        try {
            if (!$_POST) {
                $marca = $this->equipo->listarMarca();
                $dpto = $this->division->listarDpto();
                $diag = $this->diagnostico->listarLineaServicio();
                $datos = array('marca' => $marca, 'dpto' => $dpto, 'diag' => $diag);
                return $datos;
            } else {
                $ciudad = explode("/", $_POST["inb_Ciudad"]);
                $estado = explode("/", $_POST["crm_Tipificacion"]);
                $this->inbound->set("inb_Caso", Filtro::filtro_int($_POST['inb_Caso']));
                $this->inbound->set("Usuarios_usu_id", $_SESSION['usu_id']);
                $this->inbound->set("inb_IdLlamada", Filtro::filtro_string($_POST['inb_IdLlamada']));
                $this->inbound->set("inb_FechaIngreso", date("Y-m-d H:i:s"));
                $this->inbound->set("inb_Estado", Filtro::filtro_string($estado[1]));
                $this->inbound->set("inb_NombreCliente", Filtro::filtro_string($_POST['inb_NombreCliente']));
                $this->inbound->set("inb_MinCliente", Filtro::filtro_string($_POST['inb_MinCliente']));
                $this->inbound->set("inb_MinAlternoCliente", Filtro::filtro_string($_POST['inb_MinAlternoCliente']));
                $this->inbound->set("inb_UsuarioReporta", Filtro::filtro_string($_POST['inb_UsuarioReporta']));
                $this->inbound->set("inb_Ciudad", Filtro::filtro_string($ciudad[1]));
                $this->inbound->add();
                $this->crmInbound->set("Division_Politica_divp_if", Filtro::filtro_int($ciudad[0]));
                $this->crmInbound->set("Inbound_inb_Caso", Filtro::filtro_int($_POST['inb_Caso']));
                $this->crmInbound->set("Usuarios_usu_id",$_SESSION['usu_id']);
                $this->crmInbound->set("crm_FechaRegistro", date("Y-m-d H:i:s"));
                $this->crmInbound->set("crm_Servicio", Filtro::filtro_int($_POST['crm_Servicio']));
                $this->crmInbound->set("crm_Solicitud", Filtro::filtro_int($_POST['crm_Solicitud']));
                $this->crmInbound->set("crm_CausaRaiz", Filtro::filtro_int($_POST['crm_CausaRaiz']));
                $this->crmInbound->set("crm_CategoriaCierre", Filtro::filtro_int($_POST['crm_CategoriaCierre']));
                $this->crmInbound->set("crm_Tipificacion", Filtro::filtro_string($estado[1]));
                $this->crmInbound->set("crm_Observacion", Filtro::filtro_string($_POST['crm_Observacion']));
                $this->crmInbound->set("crm_MinAlterno", Filtro::filtro_int($_POST['inb_MinCliente']));
                $esca = (strpos($estado[1],"Escala")) ? "SI":"NO";
                $this->crmInbound->set("crm_Escalamiento", Filtro::filtro_string($esca));
                $pro = (strpos($estado[1],"Prog"))?$_POST['crm_FechaProgra']:"";
                $this->crmInbound->set("crm_FechaProgra",$pro);
                $this->crmInbound->set("crm_PQR", Filtro::filtro_int($_POST['crm_PQR']));
                $this->crmInbound->set("crm_TPQR", Filtro::filtro_string($_POST['crm_TPQR']));
                $this->crmInbound->set("crm_Equipo", Filtro::filtro_string($_POST['crm_Equipo']));
                $this->crmInbound->set("crm_Barrio", Filtro::filtro_string($_POST['crm_Barrio']));
                $this->crmInbound->set("crm_Inconsistencia", Filtro::filtro_string($_POST['crm_Inconsistencia']));
                $this->crmInbound->add();
            }
        } catch (\Exception $exception) {
            $_SESSION["Error"] = $exception->getMessage();
        }

    }

    public function gestionInbound($caso)
    {
        try {
            if (!$_POST) {
                $this->inbound->set("inb_Caso",$caso);
                $casoI = $this->inbound->buscarCaso();
                $this->crmInbound->set("Inbound_inb_Caso",$caso);
                $gestion = $this->crmInbound->buscarGestiones();
                $marca = $this->equipo->listarMarca();
                $dpto = $this->division->listarDpto();
                $diag = $this->diagnostico->listarLineaServicio();
                $datos = array('marca' => $marca, 'diag' => $diag,"caso"=>$casoI[0],"gestion"=>$gestion,"dpto"=>$dpto);
                return $datos;
            } else {
                $ciudad = explode("/", $_POST["inb_Ciudad"]);
                $estado = explode("/", $_POST["crm_Tipificacion"]);
                $this->inbound->set("inb_Caso", Filtro::filtro_int($_POST['inb_Caso']));
                $this->inbound->set("inb_Estado", Filtro::filtro_string($estado[1]));
                $this->inbound->edit();
                $this->crmInbound->set("Division_Politica_divp_if", Filtro::filtro_int($ciudad[0]));
                $this->crmInbound->set("Inbound_inb_Caso", Filtro::filtro_int($_POST['inb_Caso']));
                $this->crmInbound->set("Usuarios_usu_id",$_SESSION['usu_id']);
                $this->crmInbound->set("crm_FechaRegistro", date("Y-m-d H:i:s"));
                $this->crmInbound->set("crm_Servicio", Filtro::filtro_int($_POST['crm_Servicio']));
                $this->crmInbound->set("crm_Solicitud", Filtro::filtro_int($_POST['crm_Solicitud']));
                $this->crmInbound->set("crm_CausaRaiz", Filtro::filtro_int($_POST['crm_CausaRaiz']));
                $this->crmInbound->set("crm_CategoriaCierre", Filtro::filtro_int($_POST['crm_CategoriaCierre']));
                $this->crmInbound->set("crm_Tipificacion", Filtro::filtro_string($estado[1]));
                $this->crmInbound->set("crm_Observacion", Filtro::filtro_string($_POST['crm_Observacion']));
                $this->crmInbound->set("crm_MinAlterno", Filtro::filtro_int($_POST['crm_MinAlterno']));
                $esca = (strpos($estado[1],"Escala")) ? "SI":"NO";
                $this->crmInbound->set("crm_Escalamiento", Filtro::filtro_string($esca));
                $pro = (strpos($estado[1],"Prog"))?$_POST['crm_FechaProgra']:"";
                $this->crmInbound->set("crm_FechaProgra",$pro);
                $this->crmInbound->set("crm_PQR", Filtro::filtro_int($_POST['crm_PQR']));
                $this->crmInbound->set("crm_TPQR", Filtro::filtro_string($_POST['crm_TPQR']));
                $this->crmInbound->set("crm_Equipo", Filtro::filtro_string($_POST['crm_Equipo']));
                $this->crmInbound->set("crm_Barrio", Filtro::filtro_string($_POST['crm_Barrio']));
                $this->crmInbound->set("crm_Inconsistencia", Filtro::filtro_string($_POST['crm_Inconsistencia']));
                $this->crmInbound->add();
            }
        } catch (\Exception $exception) {
            //echo $exception->getMessage();
        }

    }

    public function asignar()
    {

    }

    public function agregar()
    {

    }

    public function editar()
    {

    }

    public function eliminar()
    {

    }
}

?>
