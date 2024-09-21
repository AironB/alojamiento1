<?php
//incluye la database
require_once 'Database.php';
//instanciar la clase database
$db = new Database();

//obtener la conexion de la clase database
$con = $db->getConection();
//verificamos si la conexion es exitosa
if ($con) {
    echo "Conexión exitosa";
} else {
    echo "Error de conexión";
}
?>