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

// verificar qye se reciba el id del alojamiento
if (!isset($_GET['id_alojamiento'])) {
    echo 'ERROR: No se ha especificado ningun alojamiento';
    exit();
}

// obtener el alojamiento por id
$id_alojamiento = (int)$_GET['id_alojamiento'];
$alojamiento = Alojamiento::MostrarAlojamientoPorId($db, $id_alojamiento);
// Obtener los tipos de alojamiento
$tipoAlojamiento = TipoAlojamiento::obtenerTiposAlojamientos($db);

$nombreActual = '';
$descripcionActual = '';
$ubicacionActual = '';
$precioActual = '';
$estadoActual = true;
$imagenActual = '';
$tipoActual = '';
if ($alojamiento) {
    $nombreActual = $alojamiento['nombre_alojamiento'];
    $descripcionActual = $alojamiento['descripcion'];
    $ubicacionActual = $alojamiento['ubicacion'];
    $precioActual = $alojamiento['precio'];
    $estadoActual = true;
    $imagenActual = $alojamiento['imagen'];
    $tipoActual = $alojamiento['tipo_alojamiento'];
} else {
    echo 'ERROR: No se ha encontrado el alojamiento';
    exit();
}



//manejar las solicitudes post para editar la reservacion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //obtener los valores del formulario
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $precio = (float)$_POST['precio'];
    $estado = true;
    $imagen = $_POST['imagen'] ?? '';
    $tipo = (int)$_POST['id_tipo_alojamiento'] ?? 0;

    //actualizar los datos del alojamiento
    $result = new Alojamiento($id_alojamiento, $nombre, $descripcion, $ubicacion, $precio, $estado, $imagen, $tipo);
    if ($result->editarAlojamiento($db)) {
        $exito = 'El alojamiento ha sido actualizado correctamente';
    } else {
        $error = 'Hubo un error al actualizar el alojamiento';
    }
}

//mostrar el mensaje de exito o error
if (isset($exito)) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo $exito;
        header('Location: admin.php'); ?>
    </div>
<?php } elseif (isset($error)) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php } ?>