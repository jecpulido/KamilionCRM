<?php namespace Lib;

class etCRM{
    private $col="";
    private $value ="";
    private $con;

    public function __construct(){
        $this->con = new \Models\Conexion();
    }


    public function insert($tabla,$var){
       try{
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
            $statement->execute();

        }catch (\PDOException $PDOException){

        }catch (\Exception $exception){

        }
    }

    public function update($tabla,$var){
      try{
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
          }else{
              $statement->execute();
          }
      }catch (\PDOException $PDOException){
          $msj = $PDOException->getMessage();
      }catch (\Exception $exception){
          throw  $exception;
      }
    }

    public function select($tabla,$col=null,$where=null){
    try{
        $datos=array();
        if (!empty($where)){
            foreach ($where as $key => $v){
                $this->col =$this->col. $key."=:".$key;
            }
            $this->col = " where ".$this->col;
            $sql ="Select * from $tabla".$this->col ;
        }else{
            $sql ="Select * from $tabla" ;
        }
        //echo $sql;
        $c=$this->con->getConexion();
        $statement=$c->prepare($sql);
        if (!empty($where)){
            foreach ($where as $key => &$v){
                $statement->bindparam(":".$key,$v);
            }
        }
        if($statement->execute());
        while ($result = $statement->fetch()){
            $datos[]=$result;
        }
      }catch (\PDOException $PDOException){
          $msj = $PDOException->getMessage();
      }catch (\Exception $exception){
          $msj =  $exception->getMessage();
      }
        return $datos;
    }

    public function delete(){
      try{

      }catch (\PDOException $PDOException){
          throw $PDOException;
      }catch (\Exception $exception){
          throw  $exception;
      }
    }
}
?>