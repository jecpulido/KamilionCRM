<?php namespace Controllers;

	use Models\EquipoStandar;

class inboundController{
		private $equipo;

    //Constructor
		public function __construct(){
			try{
				$this->equipo = new EquipoStandar();
			}catch (\Exception $exception){

			}
		}

		public function index(){

		}

        public function registroInbound(){
			if(!$_POST){
                $marca = $this->equipo->listarMarca();
                $datos = array('marca'=>$marca);
                return $datos;
			}
        }

        public function gestionInbound(){

        }

		public function asignar(){

		}

		public function agregar(){

		}

		public function editar(){

		}

		public function eliminar(){

		}
	}
?>
