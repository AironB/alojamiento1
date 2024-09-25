<?php
    include '../Controller/reservacionesClientes.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include '../Frontend/Layout/Navbar.php'?>
    <div class="container mt-5">
        <h2>Mis Reservaciones</h2>

        <?php if (!empty($reservaciones)) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Alojamiento</th>
                        <th>Fecha Entrada</th>
                        <th>Fecha Salida</th>
                        <th>Cantidad Personas</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservaciones as $reservacion) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($reservacion['nombre_alojamiento']); ?></td>
                            <td><?php echo htmlspecialchars($reservacion['fecha_entrada']); ?></td>
                            <td><?php echo htmlspecialchars($reservacion['fecha_salida']); ?></td>
                            <td><?php echo htmlspecialchars($reservacion['cantidad_personas']); ?></td>
                            <td><?php echo htmlspecialchars($reservacion['comentarios']); ?></td>
                            <td>
                                <a href='editar_reservacion.php?id_reservacion=<?php echo urlencode($reservacion['id_reservacion']); ?>' class="btn btn-primary btn-sm">Editar</a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="confirmCancel(<?php echo $reservacion['id_reservacion']; ?>)">Cancelar</a>
                            </td>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No tienes reservaciones.</p>
        <?php } ?>
    </div>
    <script>
        function confirmCancel(id_reservacion) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás revertir esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, cancelar',
        cancelButtonText: 'No, mantener'
    }).then((result) => {
        if (result.isConfirmed) {
            // Realizar la solicitud al servidor para cancelar la reservación
            fetch(`../Controller/cancelar_reservacion.php?id_reservacion=${id_reservacion}`, {
                    method: 'GET'
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire(
                            'Cancelada',
                            'Tu reservación ha sido cancelada.',
                            'success'
                        ).then(() => {
                            location.reload(); // Recargar la página para reflejar los cambios
                        });
                    } else {
                        Swal.fire(
                            'Error',
                            'Hubo un problema al cancelar la reservación.',
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
</body>

</html>