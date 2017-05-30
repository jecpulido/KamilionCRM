<?php
/**
 * Created by PhpStorm.
 * User: ECH2523A
 * Date: 30/05/2017
 * Time: 17:20
 */

namespace Controllers;


use Models\Inbound;

class informeController
{
    public function __construct()
    {
        try{
            $this->inbound = new Inbound();
        }catch (\Exception $exception){

        }
    }

    public function index(){
        try{
            $solicitado = $this->inbound->verSolicitado();
            $datos = array("solic"=>$solicitado);
            return $datos;
        }catch (\Exception $exception){

        }

    }
}