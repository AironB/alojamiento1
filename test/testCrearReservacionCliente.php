<?php
// Cargar el archivo de conexión a la base de datos
require_once '../Database/Database.php';
require_once '../Backend/ReservacionCliente.php';
// Crear instancia de PDO desde tu archivo de conexión
$database = new Database();
$db = $database->getConection();

    // Crear una nueva instancia de ReservacionCliente
    $reservacion = new ReservacionCliente(
        null, // id_reservacion, se genera automáticamente
        6, // id_usuario
        2, // id_alojamiento
        new DateTime('2024-09-25'), // fecha_entrada
        new DateTime('2024-09-28'), // fecha_salida
        3, // cantidad_personas
        'Comentario de prueba' // comentarios
    );

    // Probar el método de creación de reservación
    if ($reservacion->crearReservacion($db)) {
        echo "Reservación creada exitosamente.";
    } else {
        echo "Error al crear la reservación.";
    }
?>