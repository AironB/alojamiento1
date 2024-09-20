<?php
class Database{
    private $host = "localhost";
    private $db_name = "db_name";
    private $port = '3306';
    private $username = "root";
    private $charset = 'utf8';
    private $password = "";
    private $conexion;
    
    public function getConection(){
        $this->conexion = null;
        // nombre de la direccion de datos (DSN) para PDO
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset={$this->charset}";
        try{
            // crear nueva instancia de PDO
            $this->conexion = new PDO($dsn, $this->username, $this->password);

            // Set the PDO error mode to exception
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch as associative array by default
            $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch (PDOException $exception){
            echo "Error de conexion: ".$exception->getMessage();
        }
        return $this->conexion;
    }
}


?>