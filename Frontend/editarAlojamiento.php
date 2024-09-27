<?php require_once '../Controller/editarAlojamiento.php'  ?>
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
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombreActual; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcionActual; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicacion:</label>
                    <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?php echo $ubicacionActual; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $precioActual; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="id_tipo_alojamiento" class="form-label">Categoria:</label>
                    <select class="form-control" name="id_tipo_alojamiento" id="id_tipo_alojamiento" required>
                        <option value="">Seleccione nuevamente una categoría</option>
                        <?php foreach ($tipoAlojamiento as $tipo) : ?>
                            <option value="<?php echo $tipo['id_tipo_alojamiento']; ?>" <?php echo ($tipo['id_tipo_alojamiento'] == $tipoActual) ? 'selected' : ''; ?>>
                                <?php echo $tipo['nombre']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="text" class="form-control" name="imagen" id="imagen" value="<?php echo $alojamiento['imagen']; ?>" required>
                </div>
                <div class="text-center">
                    <input type="submit" value="Actualizar Alojamiento" class="form-submit btn btn-primary">
                    <a href="admin.php" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>