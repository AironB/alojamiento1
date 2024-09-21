<?php
require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// ID del alojamiento a eliminar
$id_alojamiento = 10; // Reemplaza con un ID existente

// Instanciar Alojamiento con el ID existente
$alojamiento = new Alojamiento($id_alojamiento, "", "", "", 0.0, false, "", 0);

// Llamar al método eliminarAlojamiento
if ($alojamiento->eliminarAlojamiento($db)) {
    echo "Alojamiento eliminado exitosamente.\n";
} else {
    echo "Error al eliminar el alojamiento.\n";
}
?>