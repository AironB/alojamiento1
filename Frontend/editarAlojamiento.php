<?php

require_once '../Database/Database.php';
require_once '../Backend/Alojamiento.php';
//require_once '../Backend/Cliente.php';
require_once '../Controller/mostrarAlojamiento.php';
require_once '../Backend/TipoAlojamiento.php';
//require_once '../test/testEditarAlojamiento.php';


//session_start();



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

    $nombre = $_POST['nombre_alojamiento'] ?? null;
    $descripcion = $_POST['descripcion'];
    $ubicacion = $_POST['ubicacion'];
    $precio = $_POST['precio'];
    $estado = false; // Cambiar a no disponible
    $imagen = $_POST['imagen'];
    $id_tipo_alojamiento = $_POST['id_tipo_alojamiento'];



    
    $alojamiento = new Alojamiento($id_alojamiento, $nombre, $descripcion, $ubicacion, $precio, $estado, $imagen, $id_tipo_alojamiento);

    if ($alojamiento->editarAlojamiento($db)) {
        echo "Alojamiento editado exitosamente.\n";
    } else {
        echo "Error al editar el alojamiento.\n";
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
    <a href="admin.php" class="btn btn-primary">Regresar</a>
    <div class="container">
        <div class="form-container">
            <h2 class="mb-4 text-center">Editar Alojamiento</h2>
            <form action="addAlojamiento.php" method="POST">
                <div class="mb-3">
                    <label for="nombre_alojamiento" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre_alojamiento" id="nombre_alojamiento" value="<?php echo $alojamiento['nombre_alojamiento']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $alojamiento['descripcion']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Ubicacion:</label>
                    <input type="text" class="form-control" name="Ubicacion" id="Ubicacion" value="<?php echo $alojamiento['ubicacion']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="text" class="form-control" name="precio" id="precio" value="$<?php echo $alojamiento['precio']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <?php
                    $valorPorDefecto = $alojamiento['tipo_alojamiento']; // Este valor lo obtienes de tu consulta a la base de datos

                    // Ejemplo de un array de opciones que podrías obtener de la base de datos.
                    $opciones = [
                        "opcion1" => "Opción 1",
                        "opcion2" => "Opción 2",
                        "opcion3" => "Opción 3"
                    ];
                    ?>

                    <select name="mi_select">
                        <?php foreach ($opciones as $value => $label): ?>
                            <option value="<?php echo $value; ?>" <?php echo ($value == $valorPorDefecto) ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
                            </option>
                        <?php endforeach; ?>

                        <!--<select class="form-control" name="categoria" id="categoria" value="<//?php echo $alojamiento['tipo_alojamiento']; ?>" required>
                            <option value="">Seleccione una categoría</option>
                            <option value="categoria1">Categoría 1</option>
                            <option value="categoria2">Categoría 2</option>
                            <option value="categoria3">Categoría 3</option>
                             Agrega más opciones según sea necesario 
                        </select>-->




                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>


                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="text" class="form-control" name="imagen" id="imagen" value="<?php echo $alojamiento['imagen']; ?>" required>
                </div>
                <div class="text-center">
                    <a href="admin.php?id_alojamiento=<?php echo $alojamiento['id_alojamiento']; ?>" class="btn btn-primary">Actualizar</a>
                    <!--<input type="submit" value="Guardar" class="form-submit btn btn-primary">-->
                </div>
            </form>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>