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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alojamientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Busqueda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categoria</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-auto">
                    <!-- Lista Reservaciones -->
                    <div class="dropdown me-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Reservaciones
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index.html">Nueva Reservación</a></li>
                            <li><a class="dropdown-item" href="reservaciones.php">Ver Reservaciones</a></li>
                        </ul>
                    </div>
                    
                    <!-- Log out -->
                    <a href="logIn.html" class="btn btn-danger">Log out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Contenedor del formulario -->
            <div class="col-md-7">
                <div class="form-container mx-auto">
                    <form action="reservas.php" method="post" class="mt-4">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora:</label>
                            <input type="time" class="form-control" name="hora" id="hora" required>
                        </div>
                        <div class="mb-3">
                            <label for="personas" class="form-label">Número de personas:</label>
                            <input type="number" class="form-control" name="personas" id="personas" required>
                        </div>
                        <div class="mb-3">
                            <label for="comentarios" class="form-label">Comentarios:</label>
                            <textarea name="comentarios" class="form-control" id="comentarios" rows="4"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Reservar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contenedor de la tarjeta -->
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <div class="card mb-4" style="width: 100%;">
                    <img src="https://images.trvl-media.com/lodging/95000000/94950000/94943900/94943837/a5d5e9a6.jpg?impolicy=resizecrop&rw=1200&ra=fit" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="card-price"><strong>Price:</strong> $100 per night</p>
                        <p class="card-availability"><strong>Availability:</strong> In Stock</p>
                        <a href="reservas.php" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>