<?php

require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';
require_once '../Backend/Cliente.php';
require_once '../Backend/ReservacionCliente.php';

// Iniciar sesión
session_start();

// Obtener la conexión a la base de datos
$database = new Database();
$db  = $database->getConection();


// Verificar si el cliente está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: logIn2.php');
    exit();
}


// Obtener datos del usuario autenticado
$id_usuario = $_SESSION['user_id'];


// Verificar si se ha recibido el id de la reservacion
if (!isset($_GET['id_reservacion'])) {
    echo "Error: No se ha especificado una reservacion.";
    exit();
}


// Obtener el id de la reservación recibido por GET y convertirlo a entero
$id_reservacion = isset($_GET['id_reservacion']) ? (int)$_GET['id_reservacion'] : 0;

//var_dump($_GET['id_reservacion']); // Para verificar el valor recibido

//echo "ID de reservación: " . $id_reservacion;

// Obtener las reservaciones del usuario actual
$reservacion = Reservacion::mostrarReservacionesPorUsuario($db, $id_usuario);

// Buscar la reservación con el id especificado
$reservacionParaEditar = null;
foreach ($reservacion as $reservacionActual) {
    // echo "ID de reservación actual: " . $reservacionActual['id_reservacion'] . "<br>";
    // echo "<pre>";
    // print_r($reservacionActual); // Verifica la estructura de cada reservación
    // echo "</pre>";
    
    if (isset($reservacionActual['id_reservacion']) && (int)$reservacionActual['id_reservacion'] === $id_reservacion) {
        $reservacionParaEditar = $reservacionActual;
        break;
    }
}
if (!isset($_GET['id_reservacion']) || (int)$_GET['id_reservacion'] === 0) {
    echo "Error: No se ha especificado una reservación válida.";
    exit();
}

$id_reservacion = (int)$_GET['id_reservacion'];
// Si no se encontró la reservación, mostrar un error
if (!$reservacionParaEditar) {
    echo "Error: No se encontró la reservación especificada.";
    exit();
}

// Manejar la solicitud POST para crear la reservación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $nuevaFechaEntrada = isset($_POST['fecha_entrada']) ? new DateTime($_POST['fecha_entrada']) : null;
    $nuevaFechaSalida = isset($_POST['fecha_salida']) ? new DateTime($_POST['fecha_salida']) : null;
    $nuevaCantidadPersonas = intval($_POST['cantidad_personas'] ?? 1);
    $nuevosComentarios = $_POST['comentarios'] ?? '';

    // Validar que las fechas sean válidas
    if ($nuevaFechaEntrada && $nuevaFechaSalida) {
        $reservacionEditar = new ReservacionCliente(
            $id_reservacion,
            $id_usuario,
            $reservacionParaEditar['id_alojamiento'],
            $nuevaFechaEntrada,
            $nuevaFechaSalida,
            $nuevaCantidadPersonas,
            $nuevosComentarios
        );
    // Intentar editar la reservación
    if ($reservacionEditar->editarReservacion($db)) {
        echo "Reservación editada exitosamente.";
        header('Location: reservacionesCliente.php');
    } else {
        echo "Error al editar la reservación.";
    }
} else {
    echo "Error: Fechas inválidas.";
}
}
?>