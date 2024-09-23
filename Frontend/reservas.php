<?php

require_once '../Database/Database.php';
require_once '../Backend/TipoAlojamiento.php';
require_once '../Backend/Alojamiento.php';
require_once '../Backend/Cliente.php';
session_start();

// Simular un usuario con id_usuario = 1
if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'] = 5; // Cambia este valor según necesites
}

$database = new Database();

$db  = $database->getConection();

$tipoAlojamiento = TipoAlojamiento::obtenerTiposAlojamientos($db);

$alojamiento = null;
$cliente = null;
//obtener el id desde la url
if (isset($_GET['id'])) {
    $id_alojamiento = intval($_GET['id']);
    //obtener la informacion del alojamiento por el id
    $alojamiento = Alojamiento::MostrarAlojamientoPorId($db, $id_alojamiento);
}else{
    echo 'No se ha seleccionado ningun alojamiento';
    exit;
}
// Obtener el ID del usuario desde la sesión
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = intval($_SESSION['id_usuario']);

    // Utilizar la clase Cliente para obtener la información del usuario
    $cliente = Cliente::mostrarUsuarioPorId($db, $id_usuario);
} else {
    echo "No hay un usuario en sesión.";
    exit;
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

        $reservacion = new ReservacionCliente(null,$id_usuario,$id_alojamiento,$fecha_entrada,$fecha_salida,$cantidad_personas,$comentarios,$estado);

        // Crear la reservación
        if ($reservacion->crearReservacion($db)) {
            echo "<div class='alert alert-success'>Reservación creada exitosamente.</div>";
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
                    <a href="logIn.html" class="btn btn-danger">Log out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Contenedor del formulario -->
            <div class="col-md-7">
                <div class="form-container mx-auto">
                    <form action="reservas.php?id=<?php echo htmlspecialchars($id_alojamiento); ?>" method="post" class="mt-4">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo htmlspecialchars($cliente['nombre'] ?? ''); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo htmlspecialchars($cliente['apellido'] ?? ''); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($cliente['email'] ?? ''); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_entrada" class="form-label">Fecha de Entrada:</label>
                            <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_salida" class="form-label">Fecha de Salida:</label>
                            <input type="date" class="form-control" name="fecha_salida" id="fecha_salida" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_personas" class="form-label">Número de personas:</label>
                            <input type="number" class="form-control" name="cantidad_personas" id="cantidad_personas" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="comentarios" class="form-label">Comentarios:</label>
                            <textarea name="comentarios" class="form-control" id="comentarios" rows="4"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Reservar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contenedor de la tarjeta del alojamiento -->
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <div class="card mb-4" style="width: 100%;">
                    <img src="<?php echo htmlspecialchars($alojamiento['imagen'] ?? 'https://via.placeholder.com/150'); ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($alojamiento['nombre_alojamiento'] ?? 'Alojamiento'); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($alojamiento['nombre_alojamiento'] ?? 'Nombre no disponible'); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($alojamiento['descripcion'] ?? 'Descripción no disponible'); ?></p>
                        <p class="card-price"><strong>Precio:</strong> $<?php echo htmlspecialchars($alojamiento['precio'] ?? '0'); ?> por noche</p>
                        <p class="card-availability"><strong>Disponibilidad:</strong> <?php echo htmlspecialchars($alojamiento['estado_alojamiento'] ?? 'No disponible'); ?></p>
                        <!-- No necesitas otro botón "Reservar" aquí ya que estás en la página de reservación -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>