<?php
require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// ID del alojamiento a editar
$id_alojamiento = 1; // Reemplaza con un ID existente

// Nuevos datos para el alojamiento
$nombre = "Hotel Actualizado";
$descripcion = "Descripción actualizada del hotel.";
$ubicacion = "Nueva Ciudad de Prueba";
$precio = 200.00;
$estado = false; // Cambiar a no disponible
$imagen = "hotel_actualizado.jpg";
$id_tipo_alojamiento = 2; 

// Instanciar Alojamiento con el ID existente
$alojamiento = new Alojamiento($id_alojamiento, $nombre, $descripcion, $ubicacion, $precio, $estado, $imagen, $id_tipo_alojamiento);

// Llamar al método editarAlojamiento
if ($alojamiento->editarAlojamiento($db)) {
    echo "Alojamiento editado exitosamente.\n";
} else {
    echo "Error al editar el alojamiento.\n";
}
?>
