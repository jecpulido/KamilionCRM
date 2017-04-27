<?php namespace Models;

  class DivisionPolitica{

    /*    *Atributos*    */
    private $divp_if;
    private $divp_Region;
    private $divp_IdDepartamento;
    private $divp_Departamento;
    private $divp_IdCiudad;
    private $divp_Ciudad;

    /*    *Metodos*    */
    //Constructor
    public function __construct(){

    }

    //Metodo set
    public function set($atributo,$contenido){
      $this->$atributo = $contenido;
    }
    //Metodo get
    public function get($atributo){
      return $this->$atributo;
    }
    //Buscar Todo
    public function listar(){
      $sql = "SELECT * FROM division_politica";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO division_politica(divp_if, divp_Region, divp_IdDepartamento, divp_Departamento, divp_IdCiudad, divp_Ciudad) VALUES (null,'','','','','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM division_politica WHERE divp_if={$this->divp_if}";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE division_politica SET divp_Region='',divp_IdDepartamento='',divp_Departamento='',divp_IdCiudad='',divp_Ciudad='' WHERE divp_if = '{$this->divp_if}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM division_politica WHERE divp_if={$this->divp_if}";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
