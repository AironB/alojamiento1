<?php
require_once '../Controller/mostrarAlojamientoAdmin.php';
require_once '../Backend/TipoAlojamiento.php';

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
    <?php include '../Frontend/Layout/NavbarAdmin.php'; ?>
    <div class="container">
        <div class="container-fluid pt-5">
            <div class="col-12">
                <h1 class="text-center">Alojamientos</h1>
                <a href="crearAlojamiento.php" class="btn btn-primary">Nuevo Alojamiento</a>
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
                                <a href="#" class="btn btn-info" onclick="confirmCancel(<?php echo $aloja['id_alojamiento']; ?>)">Cambiar estado</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <!-- SweetAlert para alertar que no está disponible -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function confirmCancel(id_alojamiento) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Deseas cambiar el estado del alojamiento:",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, cambiar',
                        cancelButtonText: 'No, mantener'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Realizar la solicitud al servidor para cambiar el estado del alojamiento
                            fetch(`../Controller/cambiarEstadoAlojamiento.php?id_alojamiento=${id_alojamiento}`, {
                                    method: 'GET'
                                }).then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            'Estado Cambiado',
                                            'Has cambiado el estado del alojamiento.',
                                            'success'
                                        ).then(() => {
                                            location.reload(); // Recargar la página para reflejar los cambios
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error',
                                            'Hubo un problema al intentar cambiar el estado.',
                                            'error'
                                        );
                                    }
                                }).catch(error => {
                                    Swal.fire(
                                        'Error',
                                        'Ocurrió un error en la solicitud.',
                                        'error'
                                    );
                                });
                        }
                    });
                }
            </script>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>