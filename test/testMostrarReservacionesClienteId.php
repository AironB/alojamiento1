<?php
require_once '../Database/Database.php';
require_once '../Backend/Reservacion.php';

try {
    // Crear conexión a la base de datos
    $database = new Database();
    $db = $database->getConection();

    // ID de usuario para la prueba
    $id_usuario = 5; // Reemplaza con un ID de usuario válido en tu base de datos

    // Llamar al método mostrarReservacionesPorUsuario
    $reservaciones = Reservacion::mostrarReservacionesPorUsuario($db, $id_usuario);

    // Verificar y mostrar los resultados
    if (!empty($reservaciones)) {
        echo "Reservaciones para el Usuario ID $id_usuario:\n";
        foreach ($reservaciones as $reservacion) {
            echo "-----------------------------------\n";
            echo "Nombre Cliente: " . $reservacion['nombre_cliente'] . " " . $reservacion['apellido'] . "\n";
            echo "Email: " . $reservacion['email'] . "\n";
            echo "imagen:" .$reservacion['imagen'] . "\n";
            echo "Nombre Alojamiento: " . $reservacion['nombre_alojamiento'] . "\n";
            echo "Ubicación: " . $reservacion['ubicacion'] . "\n";
            echo "tipo de alojamiento: " . $reservacion['tipo_alojamiento'] . "\n";
            echo "Precio: $" . $reservacion['precio'] . "\n";
            echo "Fecha de Entrada: " . $reservacion['fecha_entrada'] . "\n";
            echo "Fecha de Salida: " . $reservacion['fecha_salida'] . "\n";
            echo "Cantidad de Personas: " . $reservacion['cantidad_personas'] . "\n";
            echo "Comentarios: " . $reservacion['comentarios'] . "\n";
            echo "Estado: " . $reservacion['estado_reservacion'] . "\n";
        }
        echo "-----------------------------------\n";
    } else {
        echo "No se encontraron reservaciones para el Usuario ID $id_usuario.\n";
    }
} catch (Exception $e) {
    echo "Error durante la prueba: " . $e->getMessage() . "\n";
}
?>
