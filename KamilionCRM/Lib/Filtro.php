<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 2/05/2017
 * Time: 11:49 PM
 */

namespace Lib;

class Filtro{
    public static function filtro_string($var,$nombre=null){
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
            if (is_numeric($var)) {
                return $var;
            } else {
                throw new \Exception("Dato debe ser numerico");
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
            //print_r($sel);
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
            //print_r($var);
            return $var;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function llenar_listaU($var){
        try {
            $sel = array();
            foreach (array_keys($var[0]) as $key => &$v){
                if(is_string($v)){
                    $sel[] = $v;
                }
            }
            //print_r($sel);
            foreach ($sel as $key => &$v){
                if (strpos($v, "id") ){
                    $id = array($v=>"0");
                }elseif (strpos($v, "desc") ){
                    $id = $id + array($v=>"- Seleccione -");
                }else{
                    $id = array($v=>'- Seleccione -');
                }
            }
            array_unshift($var,$id);
            //print_r($var);
            return $var;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function encriptar($string){
        $output = false;
        $key = hash('sha256', KEY);
        $iv = substr(hash('sha256', IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        //echo $output;
        return $output;
    }

    public static function desencriptar($string){
        //echo $string;
        $output = false;
        $key = hash('sha256', KEY);
        $iv = substr(hash('sha256', IV), 0, 16);
        //echo $key."---------|-----------".$iv."------------".METHOD;
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);

        return $output;
    }

}
?>