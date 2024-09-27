<?php
require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';

if (isset($_GET['id_alojamiento'])) {
    $id_alojamiento = $_GET['id_alojamiento'];

    // Conexión a la base de datos
    $database = new Database();
    $db = $database->getConection();

    // Obtener el ID del usuario desde la sesión
    session_start();
    $id_usuario = $_SESSION['user_id'];

    // Crear una instancia de Alojamiento
    $alojamiento = new Alojamiento($id_alojamiento, "", "", "", 0.0, false, "", 0);

    // Alternar el estado del alojamiento llamando al nuevo método
    if ($alojamiento->alternarEstado($db)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Falta ID de alojamiento.']);
}