<?php
require_once '../Database/Database.php';
require_once '../Backend/Reservacion.php';

try {
    // Crear conexión a la base de datos
    $database = new Database();
    $db = $database->getConection();

    // Llamar al método mostrarReservaciones
    $reservaciones = Reservacion::mostrarReservaciones($db);

    // Verificar y mostrar los resultados
    if (!empty($reservaciones)) {
        echo "Todas las Reservaciones:\n";
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
        echo "No se encontraron reservaciones.\n";
    }
} catch (Exception $e) {
    echo "Error durante la prueba: " . $e->getMessage() . "\n";
}
?>
