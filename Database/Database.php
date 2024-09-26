<?php
class Database {
    private $host = "localhost";
    private $db_name = "alojamientos";
    private $port = '3306';
    private $username = "root";
    private $charset = 'utf8';
    private $password = "Subaru209$$";
    private $conexion;
    
    public function getConection() {
        $this->conexion = null;
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset={$this->charset}";
        try {
            $this->conexion = new PDO($dsn, $this->username, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error de conexion: " . $exception->getMessage();
        }
        return $this->conexion;
    }
}
?>