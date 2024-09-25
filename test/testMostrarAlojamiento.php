<?php
require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php'; // Asegúrate de que la clase Alojamiento esté en el mismo directorio o ajusta la ruta

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// Instanciar Alojamiento (los valores de los atributos no son necesarios para este método)
$alojamiento = new Alojamiento(null, "", "", "", 0.0, false, "", 0);

// Llamar al método MostrarAlojamiento
$resultados = $alojamiento->MostrarAlojamiento($db);

// Imprimir los resultados
if (!empty($resultados)) {
    foreach ($resultados as $fila) {
        echo "Nombre: " . $fila['nombre_alojamiento'] . "\n";
        echo "Imagen: " . $fila['imagen'] . "\n";
        echo "Descripción: " . $fila['descripcion'] . "\n";
        echo "Ubicación: " . $fila['ubicacion'] . "\n";
        echo "Precio: " . $fila['precio'] . "\n";
        echo "Estado: " . $fila['estado_alojamiento'] . "\n";
        echo "Tipo de Alojamiento: " . $fila['tipo_alojamiento'] . "\n";
        echo "-----------------------------------\n";
    }
} else {
    echo "No se encontraron alojamientos.\n";
}
?>