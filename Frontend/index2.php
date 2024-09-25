<?php

require_once '../Database/Database.php';
require_once '../Backend/TipoAlojamiento.php';
require_once '../Backend/Alojamiento.php';
require_once '../Backend/Autenticacion.php';
session_start();
echo "Tu id de sesion es:".session_id()."";

// Simular un usuario con id_usuario = 5
if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'] = 5; // Cambia este valor según necesites
}

$database = new Database();

$db  = $database->getConection();

$alojamiento = Alojamiento::MostrarAlojamiento($db);
$tipoAlojamiento = TipoAlojamiento::obtenerTiposAlojamientos($db);



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
  <div class="container-fluid pb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>


          <div class="search-container me-3">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>

        <div class="login-container">
          <div class="d-flex">
          <a href="logIn2.php" class="btn btn-danger ms-auto">Log out</a>
          </div>
        </div>



      </div>
    </nav>
  </div>

  <!--lista de alojamientos -->

  <div class="container-fluid pt-5">
    <div class="col-12">
      <h1 class="text-center">Alojamientos</h1>
    </div>
   <?php echo "Tu id de sesion es:".session_id()."";?>
    <a href="admin2.php" class="btn btn-primary">Crear alojamiento Nuevo</a>
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
                <a href="reservas.php?id=<?php echo $aloja['id_alojamiento']; ?>" class="btn btn-primary">Reservar</a>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>