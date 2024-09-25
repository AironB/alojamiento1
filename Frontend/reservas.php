<?php include '../Controller/reservasCliente.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--CSS-->

    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Contenedor del formulario -->
            <div class="col-md-7">
                <div class="form-container mx-auto">
                    <!-- Mostrar información del cliente -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="<?php echo $usuario['nombre']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" value="<?php echo $usuario['apellido']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $usuario['email']; ?>" readonly>
                    </div>
                    <form method="POST">
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
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
                        <input type="hidden" name="id_alojamiento" value="<?php echo $alojamiento['id_alojamiento']; ?>">
                        <button type="submit" class="btn btn-primary mt-3">Confirmar Reserva</button>
                        <a href="index.php" class="btn btn-warning mt-3">Cancelar</a>
                    </form>
                </div>
            </div>

            <!-- Contenedor de la tarjeta del alojamiento -->
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <div class="card mb-4" style="width: 100%;">
                    <img src="<?php echo htmlspecialchars($alojamiento['imagen'] ?? 'https://via.placeholder.com/150'); ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($alojamiento['nombre_alojamiento'] ?? 'Alojamiento'); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($alojamiento['nombre_alojamiento']); ?></h5>
                        <p class="card-location"><strong>Ubicación:</strong> <?php echo $alojamiento['ubicacion']; ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($alojamiento['descripcion']); ?></p>
                        <p class="card-price"><strong>Precio:</strong> $<?php echo htmlspecialchars($alojamiento['precio']); ?> por noche</p>
                        <p class="card-availability"><strong>Disponibilidad:</strong> <?php echo htmlspecialchars($alojamiento['estado_alojamiento']); ?></p>
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