<?php namespace Models;

  class Persona{

    /*    *Atributos*    */
    private $per_codigo;
    private $Complemento_Admin_ca_id;
    private $Cargo_carg_id;
    private $per_documento;
    private $per_nombre;
    private $per_apellidos;
    private $per_telefono;
    private $per_celular;
    private $per_direccion;
    private $per_correo;
    private $per_profesion;
    private $per_fechaNacimeinto;
    private $per_genero;
    private $per_rutaFoto;
    private $per_estado;

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
      $sql = "SELECT * FROM personal";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }
    //insertar
    public function add(){
      $sql = "INSERT INTO personal(per_codigo, Complemento_Admin_ca_id, Cargo_carg_id, per_documento, per_nombre, per_apellidos, per_telefono, per_celular, per_direccion, per_correo, per_profesion, per_fechaNacimeinto,per_genero,per_rutaFoto per_estado) VALUES (null,,,,,,,,,,,,)";
      $this->con->consultaSimple($sql);
    }
    //Eliminar
    public function delete(){
      $this->con->consultaSimple($sql);
      $sql = "DELETE FROM personal WHERE per_codigo='{$this->per_codigo}'";
    }
    //Actualizar
    public function edit(){
      $sql = "UPDATE personal SET Complemento_Admin_ca_id='',Cargo_carg_id='',per_documento='',per_nombre='',per_apellidos='',per_telefono='',per_celular='',per_direccion='',per_correo='',per_profesion='',per_fechaNacimeinto='',per_estado='' WHERE per_codigo='{$this->per_codigo}'";
      $this->con->consultaSimple($sql);
    }
    //Buscar por filtro
    public function view(){
      $sql = "SELECT * FROM personal WHERE per_codigo='{$this->per_codigo}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
