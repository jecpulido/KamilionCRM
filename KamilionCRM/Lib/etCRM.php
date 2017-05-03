<?php namespace Lib;

/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 30/04/2017
 * Time: 4:31 PM
 */

class etCRM{
    private $col="";
    private $value ="";
    private $con;

    public function __construct(){
        $this->con = new \Models\Conexion();
    }


    public function insert($tabla,$var){
        $c=$this->con->getConexion();
        foreach ($var as $key => $v){
            $this->col =$this->col. $key.",";
            $this->value =$this->value.":".$key.",";
        }
        $this->col = substr($this->col,0,strlen($this->col)-1);
        $this->value = substr($this->value,0,strlen($this->value)-1);
        $sql = "INSERT INTO $tabla($this->col) VALUES ($this->value)";
        //echo $sql;
        $statement=$c->prepare($sql);
        foreach ($var as $key => &$v){
            $statement->bindparam(":".$key,$v);
            //echo ":".$key."(".$v.")<br>";
            //echo $v."<br>";
        }
        try{
            if($statement->execute()){
                $_POST = null;
            }else{
                throw new \Exception("Error en registro");
            }
        }catch (\PDOException $PDOException){
            echo $PDOException->getMessage();
        }catch (\Exception $exception){
            echo  $exception->getMessage();
        }




    }

    public function update($tabla,$var){

        foreach ($var as $key => $v){
            $this->col =$this->col. $key.",";
            $this->value =$this->value.":".$key.",";
        }
        $this->col = substr($this->col,0,strlen($this->col)-1);
        $this->value = substr($this->value,0,strlen($this->value)-1);
        $sql = "INSERT INTO $tabla($this->col) VALUES ($this->value)";
        $c=$this->con->getConexion();
        $statement=$c->prepare($sql);
        foreach ($var as $key => &$v){
            $statement->bindparam(":".$key,$v);
        }
        if(!$statement){
            echo "Error en registro";
        }else{
            $statement->execute();
            echo "Perfil ingresado";
        }
    }

    public function select($tabla,$col=null,$where=null){
        if (!empty($where)){
            foreach ($where as $key => $v){
                $this->col =$this->col. $key."=:".$v;
            }
            $this->col = " where ".$this->col;
            $sql ="Select * from $tabla".$this->col ;
        }else{
            $sql ="Select * from $tabla" ;
        }
        $c=$this->con->getConexion();
        $statement=$c->prepare($sql);
        if (!empty($where)){
            foreach ($where as $key => &$v){
                $statement->bindparam(":".$key,$v);
            }
        }
        $statement->execute();
        while ($result = $statement->fetch()){
            $datos[]=$result;
        }
        return $datos;
    }

    public function delete(){

    }



}