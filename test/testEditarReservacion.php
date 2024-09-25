<?php
// Cargar el archivo de conexión a la base de datos
require_once '../Database/Database.php';
require_once '../Backend/ReservacionCliente.php';
// Crear instancia de PDO desde tu archivo de conexión
$database = new Database();
$db = $database->getConection();
$idReservacionParaEditar = 11;
$nuevaFechaEntrada = new DateTime('2024-09-25');
$nuevaFechaSalida = new DateTime('2024-09-27');
$nuevaCantidadPersonas = 10;
$nuevoComentarios = "";
    // Crear una nueva instancia de ReservacionCliente
    $reservacionEditar = new ReservacionCliente(
        $idReservacionParaEditar,
        0, // id_usuario
        0, // id_alojamiento
        $nuevaFechaEntrada, // fecha_entrada
        $nuevaFechaSalida, // fecha_salida
        $nuevaCantidadPersonas, // cantidad_personas
        $nuevoComentarios // comentarios
    );

    // Probar el método de edicion de reservación
    if ($reservacionEditar->editarReservacion($db)) {
        echo "Reservación editada exitosamente.";
    } else {
        echo "Error al crear la reservación.";
    }
?>