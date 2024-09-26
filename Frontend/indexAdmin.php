<?php
require_once '../Controller/mostrarAlojamiento.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos El salvador</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">


</head>

<body>
    <?php include '../Frontend/Layout/Navbar.php' ?>

    <!--lista de alojamientos -->

    <div class="container-fluid pt-5">
        <div class="col-12">
            <h1 class="text-center">Alojamientos</h1>
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
                            <?php if ($aloja['estado_alojamiento'] === 'Alojamiento disponible') { ?>
                                <a href="reservas.php?id_alojamiento=<?php echo $aloja['id_alojamiento']; ?>" class="btn btn-primary">Reservar</a>
                            <?php } else { ?>
                                <button class="btn btn-secondary" onclick="mostrarAlerta()">No disponible</button>
                            <?php } ?>
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

</body>

</html>