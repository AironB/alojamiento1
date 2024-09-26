<?php
require_once '../Controller/mostrarAlojamiento.php';
require_once '../Backend/TipoAlojamiento.php';

require_once '../Controller/mostrarAlojamiento.php';

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
        <div class="container-fluid pt-5">
            <div class="col-12">
                <h1 class="text-center">Alojamientos</h1>
                <a href="crearAlojamiento.php" class="btn btn-primary">Agregar Alojamiento</a>
            </div>
            <div class="row">
                <!-- Fila para las tarjetas -->
                <?php
                foreach ($alojamiento as $aloja) { ?>
                    <div class="col-4 pb-3 pt-3">
                        <div class="card">
                            <img src="<?php echo $aloja['imagen']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $aloja['nombre_alojamiento']; ?></h5>
                                <p class="card-location"><strong>Ubicación:</strong> <?php echo $aloja['ubicacion']; ?></p>
                                <p class="card-text"><?php echo $aloja['descripcion']; ?></p>
                                <p class="card-text"><?php echo $aloja['tipo_alojamiento']; ?></p>
                                <p class="card-price"><strong>Precio:</strong> $<?php echo $aloja['precio']; ?> por noche</p>
                                <p class="card-availability"><strong>Estado:</strong> <?php echo $aloja['estado_alojamiento']; ?></p>
                                    <a href="editarAlojamiento.php?id_alojamiento=<?php echo $aloja['id_alojamiento']; ?>" class="btn btn-primary">Editar</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <!-- SweetAlert para alertar que no está disponible -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function mostrarAlerta() {
                    Swal.fire({
                        icon: 'error',
                        title: 'No disponible',
                        text: 'Este alojamiento no está disponible para reservaciones.',
                    });
                }
            </script>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>