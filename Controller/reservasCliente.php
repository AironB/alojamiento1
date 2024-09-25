<?php

require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';
require_once '../Backend/Cliente.php';
session_start();



$database = new Database();
$db  = $database->getConection();


// Verificar si el cliente está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: logIn2.php');
    exit();
}

// Obtener datos del usuario autenticado
$id_usuario = $_SESSION['user_id'];
$usuario = Cliente::mostrarUsuarioPorId($db, $id_usuario);


// Verificar si se ha recibido el id del alojamiento
if (!isset($_GET['id_alojamiento'])) {
    echo "Error: No se ha especificado un alojamiento.";
    exit();
}

$id_alojamiento = (int)$_GET['id_alojamiento'];
$alojamiento = Alojamiento::MostrarAlojamientoPorId($db, $id_alojamiento);

// Verificar si se ha encontrado el alojamiento
if (!$alojamiento) {
    echo "Error: El alojamiento no fue encontrado.";
    exit();
}

// Manejar la solicitud POST para crear la reservación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $fecha_entrada = $_POST['fecha_entrada'] ?? null;
    $fecha_salida = $_POST['fecha_salida'] ?? null;
    $cantidad_personas = intval($_POST['cantidad_personas'] ?? 1);
    $comentarios = $_POST['comentarios'] ?? '';
    $estado = true;
    if ($cantidad_personas < 1) {
        $errors[] = "Debe haber al menos una persona.";
    }

    if (empty($errors)) {
        // Crear una instancia de ReservacionCliente
        require_once '../Backend/ReservacionCliente.php'; // Asegúrate de tener esta clase

        $reservacion = new ReservacionCliente(null, $id_usuario, $id_alojamiento, new DateTime($fecha_entrada), new DateTime($fecha_salida), $cantidad_personas, $comentarios, $estado);

        // Crear la reservación
        if ($reservacion->crearReservacion($db)) {
            echo "<div class='alert alert-success'>Reservación creada exitosamente.</div>";
            header('Location: index.php');
        } else {
            echo "<div class='alert alert-danger'>Hubo un error al crear la reservación.</div>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
}

?>