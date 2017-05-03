<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 2/05/2017
 * Time: 11:49 PM
 */

namespace Lib;


class Filtro{
    public static function filtro($var,$tipo,$nombre){
      try {
        if (gettype($var) == "NULL"){
          throw new Exception("Por favor llene el campo ".$nombre);
        }else{
          if ($tipo == "string"){

            throw new Exception("El campo ".$nombre."debe ser texto");

          }elseif ($tipo == "integer"){

            throw new Exception("El campo ".$nombre."debe ser numerico");

          }elseif ($tipo == "double"){

            throw new Exception("El campo ".$nombre."debe ser texto");
          }
        }
      } catch (Exception $e) {
        throw $e->getMessage();
      }



    }

}
