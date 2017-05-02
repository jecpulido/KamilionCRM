<?php  namespace Models;
//include_once "../config/Config.php";
	class Conexion{

		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"db"=> "kamilion"
			 );


		private $con;

		public function __construct(){
			// $this->con =  new \mysqli($this->datos["host"],$this->datos["user"],$this->datos["pass"],$this->datos["db"]);
			$this->con = new \PDO("mysql:host=".$this->datos["host"].";dbname=".$this->datos["db"],$this->datos["user"],$this->datos["pass"]);
		}


		public function getConexion(){
			return $this->con;
		}


	}

/*
	$model = new Conexion();
$sql = "SELECT * FROM `perfil` WHERE 1";
$statement = $con->prepare($sql);
$datos = $model->consultaRetorno($statement);
foreach ($datos as $dato){
    print "Perfil:".$dato['perf_descripcion'];
}*/


?>
