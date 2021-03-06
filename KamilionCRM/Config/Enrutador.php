<?php namespace Config;

	use Lib\Redirecciona;

class Enrutador{

		public static function run(Request $request){

            $controlador = $request->getControlador() . "Controller";
            $ruta = ROOT . "Controllers" . DS . $controlador . ".php";
            //echo $ruta;
            $metodo = $request->getMetodo();
            //echo $metodo;
            if ($metodo == "index.php") {
                $metodo = "index";
            }

            $argumento = $request->getArgumento();

            if (is_readable($ruta)) {
                require_once $ruta;
                $mostrar = "Controllers\\" . $controlador;
                $controlador = new $mostrar;

                if (!isset($argumento)) {
                    $datos = call_user_func(array($controlador, $metodo));
                } else {
                    $datos = call_user_func_array(array($controlador, $metodo), $argumento);
                }
            }
            //Cargar vista
            $ruta = ROOT . "Views" . DS . $request->getControlador() . DS . $request->getMetodo() . ".php";
            //print $ruta;
            if (is_readable($ruta)) {
                require_once $ruta;
            } else {
                print "No se encontro la vista";
            }


		}

	}
?>
