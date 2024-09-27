<?php
require_once '../Backend/TipoAlojamiento.php';
require_once '../Database/Database.php';
require_once '../Backend/Autenticacion.php';
require_once '../Backend/Alojamiento.php';

// Iniciar sesión y comprobar si el usuario está autenticado para reservar un alojamiento
session_start();
$database = new Database();

$db  = $database->getConection();
//instanciar la autenticacion
$auth = new Autenticacion();

    if (!$auth->estaAutenticado()) {
        //redirigir a login si no esta autenticado
        header('Location: logIn2.php');
        exit();
    }


$tipoAlojamiento = TipoAlojamiento::obtenerTiposAlojamientos($db);
// Manejar la solicitud POST para crear la reservación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;
    $ubicacion = $_POST['ubicacion'] ?? null;
    $precio = $_POST['precio'] ?? null;
    $estado = true;
    $imagen = $_POST['imagen'] ?? null;
    $id_tipo_alojamiento = $_POST['id_tipo_alojamiento'] ?? null;

    $alojamiento = new Alojamiento(null, $nombre, $descripcion, $ubicacion, $precio, $estado, $imagen, $id_tipo_alojamiento);

    // Crear la reservación
    if ($alojamiento->crearAlojamiento($db)) {
        echo "<div class='alert alert-success'>Alojamiento creada exitosamente.</div>";
        header('Location: admin.php');
    } else {
        echo "<div class='alert alert-danger'>Hubo un error al crear el alojamiento.</div>";
    }
}
?>