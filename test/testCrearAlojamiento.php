<?php
require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// Datos de prueba para el nuevo alojamiento
$nombre = "Hotel Prueba";
$descripcion = "Un hotel de prueba para propósitos de testing.";
$ubicacion = "Ciudad de Prueba";
$precio = 150.00;
$estado = true; // true para disponible, false para no disponible
$imagen = "hotel_prueba.jpg";
$id_tipo_alojamiento = 1; 

// Instanciar Alojamiento con id_alojamiento nulo (autogenerado)
$alojamiento = new Alojamiento(null, $nombre, $descripcion, $ubicacion, $precio, $estado, $imagen, $id_tipo_alojamiento);

// Llamar al método crearAlojamiento
if ($alojamiento->crearAlojamiento($db)) {
    echo "Alojamiento creado exitosamente.\n";
} else {
    echo "Error al crear el alojamiento.\n";
}
?>
