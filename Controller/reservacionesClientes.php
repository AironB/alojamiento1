<?php
session_start();
require_once '../Database/Database.php';
require_once '../Backend/ReservacionCliente.php';
require_once '../Backend/Autenticacion.php';
$auth = new Autenticacion();
// Obtener datos del usuario autenticado
if (!isset($_SESSION['user_id'])) {
    echo "Error: El usuario no está autenticado.";
    header('Location: logIn2.php');
    exit();
}
var_dump($_SESSION['user_id']); // Verificar el valor

$id_usuario = $_SESSION['user_id'];

// Conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// Obtener las reservaciones del usuario actual del sistema
$reservaciones = ReservacionCliente::MostrarReservacionesPorUsuario($db, $id_usuario);
?>
