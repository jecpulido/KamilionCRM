<?php namespace Config;

	class Autoload{
		public static $rutas=array();
		public static function run(){
            spl_autoload_register(function($class){
                $ruta = str_replace("\\", "/", $class) . ".php";
                //echo $ruta."<br>";
                if (in_array($ruta, Autoload::$rutas)) {
					exit();
                }else{
                    array_push(Autoload::$rutas,$ruta);
                    include_once $ruta;
                }

			});
        }

	}

?>
