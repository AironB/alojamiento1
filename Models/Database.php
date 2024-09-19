<?php
class Database{
    private $host = "localhost";
    private $db_name = "db_name";
    private $username = "root";
    private $password = "";
    private $conexion;
    
    public function getConection(){
        $this->conexion = null;

        try{
            $this->conexion = new PDO(
                "mysql:host=".$this->host.
                ";dbname=".$this->db_name, 
                $this->username,
                $this->password
            );
        }catch (PDOException $exception){
            echo "Error de conexion: ".$exception->getMessage();
        }
        return $this->conexion;
    }
}


?>