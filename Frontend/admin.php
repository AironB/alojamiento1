<?php
session_start();
require_once '../Backend/Autenticacion.php';

$auth = new Autenticacion();

if (!$auth->estaAutenticado() || !$auth->isAdmin()) {
    // Si no está autenticado o no es administrador, redirigir a la página de login
    header('Location: logIn2.php');
    exit;
}


// session_start();

// if (!isset($_SESSION['user_id'])) {
//     header('Location: logIn2.php');
//     exit;
// }

// echo "<h1>Welcome, Admin</h1>";
// echo "<p>Name: " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "</p>";
// echo "<p>Email: " . $_SESSION['email'] . "</p>";
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
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

