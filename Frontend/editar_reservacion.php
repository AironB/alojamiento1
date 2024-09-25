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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--CSS-->

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alojamientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Busqueda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categoria</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-auto">
                    <!-- Lista Reservaciones -->
                    <div class="dropdown me-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Reservaciones
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index.html">Nueva Reservación</a></li>
                            <li><a class="dropdown-item" href="reservaciones.php">Ver Reservaciones</a></li>
                        </ul>
                    </div>

                    <!-- Log out -->
                    <a href="logIn2.php" class="btn btn-danger">Log out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Contenedor del formulario -->
            <div class="col-md-7">
                <div class="form-container mx-auto">
                    <!-- Mostrar información del cliente -->
                    <form method="POST">
                        <input type="hidden" name="id_alojamiento" value="<?php echo $reservacionParaEditar['id_reservacion']; ?>">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del cliente:</label>
                            <input type="text" class="form-control" id="nombre" value="<?php echo $reservacionParaEditar['nombre_cliente']; ?> <?php echo $reservacionParaEditar['apellido']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_alojamiento" class="form-label">nombre_alojamiento</label>
                            <input type="text" class="form-control" id="nombre_alojamiento" value="<?php echo $reservacionParaEditar['nombre_alojamiento']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">ubicacion</label>
                            <input type="text" class="form-control" id="ubicacion" value="<?php echo $reservacionParaEditar['ubicacion']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_alojamiento" class="form-label">tipo_alojamiento</label>
                            <input type="text" class="form-control" id="tipo_alojamiento" value="<?php echo $reservacionParaEditar['tipo_alojamiento']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                            <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada" value="<?php echo $reservacionParaEditar['fecha_entrada']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_salida" class="form-label">Fecha de Salida</label>
                            <input type="date" class="form-control" name="fecha_salida" id="fecha_salida" value="<?php echo $reservacionParaEditar['fecha_salida']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_personas" class="form-label">Cantidad de Personas</label>
                            <input type="number" class="form-control" name="cantidad_personas" id="cantidad_personas" min="1" value="<?php echo $reservacionParaEditar['cantidad_personas']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="comentarios" class="form-label">Comentarios</label>
                            <textarea class="form-control" name="comentarios" id="comentarios" rows="4"><?php echo $reservacionParaEditar['comentarios']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Reservación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>