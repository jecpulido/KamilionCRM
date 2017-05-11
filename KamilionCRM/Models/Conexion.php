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
    	try{
				// $this->con =  new \mysqli($this->datos["host"],$this->datos["user"],$this->datos["pass"],$this->datos["db"]);
			//$this->con = new \PDO("mysql:host=".$this->datos["host"].";dbname=".$this->datos["db"],$this->datos["user"],$this->datos["pass"]);
            $this->con = new \PDO("mysql:host=".HOST.";dbname=".DB,USER,PASSWORD);
        	$this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			}catch (\PDOException $PDOException){
					$msj = $PDOException->getMessage();
			}catch (\Exception $exception){
            		$msj = $exception->getMessage();
			}
		}
		public function getConexion(){
			return $this->con;
		}


	}
?>