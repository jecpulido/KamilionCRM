<?php namespace Models;

  class Diagnostico{

    /*    *Atributos*    */
    private $diag_id;
    private $diag_Tipificacion1;
    private $diag_Tipificacion2;
    private $diag_Tipificacion3;
    private $diag_Tipificacion4;
    private $diag_Cod_diagnostico;
    private $diag_Pertenece;

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
      $sql = "SELECT * FROM diagnostico WHERE diag_id='{$this->diag_id}'";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO diagnostico(diag_id, diag_Tipificacion1, diag_Tipificacion2, diag_Tipificacion3, diag_Tipificacion4, diag_Cod_diagnostico, diag_Pertenece) VALUES (null,'','','','','','')";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $sql = "DELETE FROM diagnostico WHERE diag_id='{$this->diag_id}'";
      $this->con->consultaSimple($sql);
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE diagnostico SET diag_Tipificacion1='',diag_Tipificacion2='',diag_Tipificacion3='',diag_Tipificacion4='',diag_Cod_diagnostico='',diag_Pertenece='' WHERE diag_id='{$this->diag_id}' ";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM `diagnostico` WHERE diag_id='{$this->diag_id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
