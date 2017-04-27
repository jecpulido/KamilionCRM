<?php  namespace Models;

	class Conexion{

		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"db"=> "kamilion"
			 );

		private $con;

		public function __construct(){
			$this->con =  new \mysqli($this->datos["host"],$this->datos["user"],$this->datos["pass"],$this->datos["db"]);
		}

		public function consultaSimple($sql){
			$this->con->query($sql);
		}

		public function consultaRetorno($sql){
			$datos = $this->con->query($sql);

			return $datos;
		}
	}

$con = new Conexion();
$sql = "SELECT * FROM `perfil` WHERE 1";
$datos = $con->consultaRetorno($sql);
$row = mysqli_fetch_assoc($datos);
echo "Perfil:".$row["perf_descripcion"];
 ?>
