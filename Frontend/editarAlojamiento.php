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
    // $fecha_entrada = $_POST['fecha_entrada'] ?? null;
    // $fecha_salida = $_POST['fecha_salida'] ?? null;
    // $cantidad_personas = intval($_POST['cantidad_personas'] ?? 1);
    // $comentarios = $_POST['comentarios'] ?? '';
    // $estado = true;
    // Nuevos datos para el alojamiento
$nombre = $_POST['nombre_alojamiento'] ?? null;
$descripcion = "Descripción actualizada del hotel.";
$ubicacion = "Nueva Ciudad de Prueba";
$precio = 200.00;
$estado = false; // Cambiar a no disponible
$imagen = "hotel_actualizado.jpg";
$id_tipo_alojamiento = 6;
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alojamiento</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">

</head>

<body>

    <!-- Mensaje de administrador -->
    <div class="admin-message d-flex justify-content-center align-items-center">
        <span>Soy Administrador</span>
        <a href="logIn2.php" class="btn btn-danger ms-auto">Log out</a>
    </div>

    <div class="container">
        <div class="form-container">
            <h2 class="mb-4 text-center">Agregar Alojamiento</h2>
            <form action="addAlojamiento.php" method="POST">
                <div class="mb-3">
                    <label for="nombre_alojamiento" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre_alojamiento" id="nombre_alojamiento" value="<?php echo $alojamiento['nombre_alojamiento']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Ubicacion:</label>
                    <input type="text" class="form-control" name="Ubicacion" id="Ubicacion" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="text" class="form-control" name="precio" id="precio" required>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <select class="form-control" name="categoria" id="categoria" required>
                        <option value="">Seleccione una categoría</option>
                        <option value="categoria1">Categoría 1</option>
                        <option value="categoria2">Categoría 2</option>
                        <option value="categoria3">Categoría 3</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>


                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
                </div>
                <div class="text-center">
                    <input type="submit" value="Agregar" class="form-submit btn btn-primary">
                </div>
            </form>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>