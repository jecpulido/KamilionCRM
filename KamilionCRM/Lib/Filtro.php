<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 2/05/2017
 * Time: 11:49 PM
 */

namespace Lib;


class Filtro{
    public static function filtro_string($var=null,$nombre){
      try {
        if (!empty($var)){
          if(is_string($var)){
            return trim($var);
          }else{
            throw new \Exception($nombre . "Debe ser de tipo texto",1);
          }
        }else{
          throw new \Exception("Por favor llene el campo ".$nombre,1);
        }
      }catch (\Exception $exception){
          throw $exception;
      }finally{

}
    }

    public static function filtro_int($var){
      try {
        if (!empty($var)){
          if(is_int($var)){
              return $var;
          }else{
            throw new Exception("Variable no se encuentra definida");
          }
          throw new Exception("Variable no se encuentra definida");
        }
      } catch (Exception $e) {
        throw $e;

      }
    }
    public static function filtro_email($var){
      try {
        if (!empty($var)){
          if(is_int($var)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
              return $var;
            }
          }else{
            throw new Exception("Variable no se encuentra definida");
          }
          throw new Exception("Variable no se encuentra definida");
        }
      } catch (Exception $e) {
        throw $e;
      }
    }

    public static function filtro_lista($var,$nombre){
      try {
        if (!empty($var)){
          if($var != 0 && $var != "- Seleccione -"){
              return $var;
          }else{
            throw new Exception("Seleccione una opcion de ".$nombre."!");
          }
        }else{
          throw new Exception("Seleccione una opcion de ".$nombre);
        }
      } catch (Exception $e) {
        throw $e;
      }
    }

}
