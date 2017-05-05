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
              header("Location: " . URL . "admin/agregarPesona");
            throw new \Exception($nombre . " Debe ser de tipo texto",1);
          }
        }else{
            header("Location: " . URL . "admin/agregarPesona");
          throw new \Exception("Por favor llene el campo ".$nombre,1);
        }
      }catch (\Exception $exception){
          throw $exception;
      }finally{}
    }

    public static function filtro_int($var){
      try {
        if (!empty($var)) {
            if (is_int($var)) {
                return $var;
            } else {
                throw new \Exception("Variable no se encuentra definida");
            }
        }else{
          throw new \Exception("Variable no se encuentra definida");
        }
      } catch (\Exception $e) {
        throw $e;
      }
    }
    public static function filtro_email($var){
      try {
        if (!empty($var)) {
            if (is_int($var)) {
                if (filter_var($var, FILTER_VALIDATE_EMAIL)) {
                    return $var;
                }
            } else {
                throw new \Exception("Variable no se encuentra definida");
            }
        }else{
          throw new \Exception("Variable no se encuentra definida");
        }
      } catch (\Exception $e) {
        throw $e;
      }
    }

    public static function filtro_lista($var,$nombre){
      try {
        if (!empty($var)){
          if($var != 0 && $var != "- Seleccione -" && $var != '0'){
              return $var;
          }else{
            throw new \Exception("Seleccione una opcion de ".$nombre."!");
          }
        }else{
          throw new \Exception("Seleccione una opcion de ".$nombre);
        }
      } catch (\Exception $e) {
        throw $e;
      }
    }

    public static function llenar_lista($var){
        try {
            $sel = array();
            foreach (array_keys($var[0]) as $key => &$v){
                if(is_string($v)){
                    $sel[] = $v;
                }
            }
//            print_r($sel);
            foreach ($sel as $key => &$v){
               if (strpos($v, "id") ){
                   $id = array($v=>"0");
               }elseif (strpos($v, "desc") ){
                   $id = $id + array($v=>"- Seleccione -");
               }else{
                   $id = $id + array($v=>"none");
               }
            }
           array_unshift($var,$id);
            return $var;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
?>