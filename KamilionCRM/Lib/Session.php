<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 11/05/2017
 * Time: 12:20 AM
 */

namespace Lib;


class Session{

    //permite validar si existe una session
    public static function has($variable_session){
        if(isset($_SESSION[$variable_session])){
            return true;
        }else{
            return false;
        }
    }

    //obtiene una variable de session
    public static function get($variable_session){
        try{
            $mensaje = $_SESSION[$variable_session];
            session_unset($_SESSION[$variable_session]);
            return $mensaje;
        }catch(\Exception $ex){}
    }

}