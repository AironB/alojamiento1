<?php
session_start();
require_once '../Database/Database.php';
require_once '../Backend/Autenticacion.php';
require_once '../Backend/TipoAlojamiento.php';
require_once '../Backend/Alojamiento.php';

$auth = new Autenticacion();
if (isset($_GET['reservar'])) {
  if (!$auth->estaAutenticado()) {
    //redirigir a login si no esta autenticado
    header('Location: logIn2.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit();
    //si esta autenticado continuar con la reservation
  }
}
$database = new Database();

$db  = $database->getConection();

$alojamiento = Alojamiento::MostrarAlojamiento($db);



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
              <?php
              if ($auth->estaAutenticado()) {
                // Si el usuario está autenticado, mostrar "Cerrar sesión"
                echo '<a href="logout.php" class="btn btn-danger ms-auto">Cerrar Sesión</a>';
              } else {
                // Si no está autenticado, mostrar "Iniciar sesión"
                echo '<a href="logIn2.php" class="btn btn-danger ms-auto">Iniciar Sesión</a>';
              }
              ?>
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
              <a href="?reservar=<?php echo $aloja['id_alojamiento']; ?>" class="btn btn-primary">Reservar</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>