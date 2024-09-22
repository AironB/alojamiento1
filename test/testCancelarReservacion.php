<?php
// Cargar el archivo de conexión a la base de datos
require_once '../Database/Database.php';
require_once '../Backend/ReservacionCliente.php';
// Crear instancia de PDO desde tu archivo de conexión
$database = new Database();
$db = $database->getConection();
$idReservacionParaCancelar = 11;
    // Crear una nueva instancia de ReservacionCliente
    $reservacionCancelar = new ReservacionCliente(
        $idReservacionParaCancelar,
        0, // id_usuario
        0, // id_alojamiento
        new DateTime(), // fecha_entrada
        new DateTime(), // fecha_salida
        0, // cantidad_personas
        '', // comentarios
        true, //estado default
    );

    // Probar el método de creación de reservación
    if ($reservacionCancelar->cancelarReservacion($db)) {
        echo "Reservación cancelada exitosamente.";
    } else {
        echo "Error al cancelar la reservación.";
    }
?>