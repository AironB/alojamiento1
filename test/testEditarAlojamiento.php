<?php
require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// ID del alojamiento a editar
$id_alojamiento = $_POST['id_alojamiento']; // Reemplaza con un ID existente

// Nuevos datos para el alojamiento
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$precio = $_POST['precio'];
$estado = false; // Cambiar a no disponible
$imagen = $_POST['imagen'];
$id_tipo_alojamiento = $_POST['id_tipo_alojamiento']; 

// Instanciar Alojamiento con el ID existente
$alojamiento = new Alojamiento($id_alojamiento, $nombre, $descripcion, $ubicacion, $precio, $estado, $imagen, $id_tipo_alojamiento);

// Llamar al método editarAlojamiento
if ($alojamiento->editarAlojamiento($db)) {
    echo "Alojamiento editado exitosamente.\n";
} else {
    echo "Error al editar el alojamiento.\n";
}
?>
