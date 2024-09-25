<?php
session_start();
require_once '../Database/Database.php';
require_once '../Backend/ReservacionCliente.php';
require_once '../Backend/Autenticacion.php';
$auth = new Autenticacion();
// Obtener datos del usuario autenticado
$id_usuario = $_SESSION['user_id'];

// Conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// Obtener las reservaciones del usuario actual del sistema
$reservaciones = ReservacionCliente::MostrarReservacionesPorUsuario($db, $id_usuario);
?>
