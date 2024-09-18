<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table img {
            max-width: 100px;
            height: auto;
            object-fit: cover;
        }
        .btn {
            margin-right: 0.5rem;
        }
        .total-row {
            background-color: #f8f9fa; /* Color de fondo para diferenciar la fila de total */
            font-weight: bold; /* Pone el texto en negrita */
        }
        .total-row td {
            padding: 1rem; /* Espaciado dentro de las celdas */
            border-top: 2px solid #dee2e6; /* Línea superior para separar la fila del resto */
        }
        .total-row .text-end {
            text-align: right; /* Alinea el texto a la derecha */
        }
    </style>
</head>
<body>
    <!-- regresar a inicio-->
     


    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Fecha de entrada</th>
                    <th>Fecha de salida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nombre</td>
                    <td><img src="https://via.placeholder.com/100" alt="Imagen del producto"></td>
                    <td>$100</td>
                    <td>Fecha de entrada</td>
                    <td>Fecha de salida</td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <!-- Añadir más filas aquí si es necesario -->
                <tr class="total-row">
                    <td colspan="5" class="text-end">Total</td>
                    <td>$100</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


