<?php require_once '../Controller/editarReservasCliente.php'?>
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

    <div class="container mt-5 ">
        <div class="row">
            <!-- Contenedor del formulario -->
            <div class="col-8 ">
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
                        <a href="reservacionesCliente.php" class="btn btn-warning">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>