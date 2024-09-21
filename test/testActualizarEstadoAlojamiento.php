<?php
require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// ID del alojamiento a actualizar
$id_alojamiento = 1; // Reemplaza con un ID existente

// Nuevo estado
$nuevo_estado = false; // true para disponible, false para no disponible

// Instanciar Alojamiento con el ID existente
$alojamiento = new Alojamiento($id_alojamiento, "", "", "", 0.0, $nuevo_estado, "", 0);

// Llamar al método actualizarEstado
if ($alojamiento->actualizarEstado($db, $nuevo_estado)) {
    echo "Estado del alojamiento actualizado exitosamente.\n";
} else {
    echo "Error al actualizar el estado del alojamiento.\n";
}
?>