<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alojamiento</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 1rem;
        }

        .form-submit {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
        }

        .form-submit:hover {
            background-color: #0056b3;
        }

        .admin-message {
            background-color: #343a40;
            color: white;
            padding: 1rem;
            text-align: center;
            font-size: 1.25rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Mensaje de administrador -->
    <div class="admin-message d-flex justify-content-center align-items-center">
        <span>Soy Administrador</span>
        <a href="logIn.php" class="btn btn-danger ms-auto">Log out</a>
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

