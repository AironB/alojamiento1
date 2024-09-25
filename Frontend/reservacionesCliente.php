<?php
session_start();
require_once '../Database/Database.php';
require_once '../Backend/ReservacionCliente.php';
require_once '../Backend/Autenticacion.php';
$auth = new Autenticacion();
// Obtener datos del usuario autenticado
$id_usuario = $_SESSION['user_id'];

// Conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// Obtener las reservaciones del usuario actual del sistema
$reservaciones = ReservacionCliente::MostrarReservacionesPorUsuario($db, $id_usuario);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
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
                                <a href='cancelar_reservacion.php?id_reservacion=<?php echo urlencode($reservacion['id_reservacion']); ?>' class="btn btn-danger btn-sm">Cancelar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No tienes reservaciones.</p>
        <?php } ?>
    </div>

</body>

</html>