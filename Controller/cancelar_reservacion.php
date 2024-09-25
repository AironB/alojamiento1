<?php
require_once '../Database/Database.php';
require_once '../Backend/ReservacionCliente.php';

if (isset($_GET['id_reservacion'])) {
    $id_reservacion = $_GET['id_reservacion'];

    // Conexión a la base de datos
    $database = new Database();
    $db = $database->getConection();

    // Obtener el ID del usuario desde la sesión
    session_start();
    $id_usuario = $_SESSION['user_id'];

    // Crear una instancia de ReservacionCliente
    $reservacion = new ReservacionCliente($id_reservacion, $id_usuario, 0, new DateTime(), new DateTime(), 0, '', false);

    // Intentar cancelar la reservación
    if ($reservacion->cancelarReservacion($db)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Falta ID de reservación.']);
}
?>

