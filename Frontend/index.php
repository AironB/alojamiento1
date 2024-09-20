<?php

require 'database/database.php';

// Prepare a SELECT statement

$stmt = $pdo->prepare('SELECT * FROM alojamientos');

// Execute the statement

$stmt->execute();

// Fetch all the results

$alojamientos = $stmt->fetchAll();

echo '<pre>
  var_dump($results);
</pre>'



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
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <!--
        navbar
        contenido de el navbar
        Inicio
        Alojamientos
        Contacto
        log in
        busqueda
        categoria
    -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
            <a href="signUp.php" class="btn btn-primary">Log in</a>
          </div>
        </div>



      </div>
    </div>
  </nav>

  <!--lista de alojamientos -->

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Alojamientos</h1>
      </div>
    </div>

    <!-- Fila para las tarjetas -->
    <div class="row">
      <!-- Tarjeta 1 -->
      <div class="col-4">
        <div class="card">
          <?php foreach ($alojamientos as $alojamiento) : ?>
            <img src="<?php echo $alojamiento['imagen']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $alojamiento['nombre']; ?></h5>
              <p class="card-text"><?php echo $alojamiento['descripcion']; ?></p>
              <p class="card-price"><strong>Price:</strong> $<?php echo $alojamiento['precio']; ?> per night</p>
              <p class="card-availability"><strong>Availability:</strong> <?php echo $alojamiento['disponibilidad']; ?></p>
              <a href="reservas.php" class="btn btn-primary">Reservar</a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Tarjeta 2 -->
      <!-- <div class="col-4">
        <div class="card">
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

       Tarjeta 3 -
      <div class="col-4">
        <div class="card">
          <img src="https://images.trvl-media.com/lodging/95000000/94950000/94943900/94943837/a5d5e9a6.jpg?impolicy=resizecrop&rw=1200&ra=fit" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <p class="card-price"><strong>Price:</strong> $100 per night</p>
            <p class="card-availability"><strong>Availability:</strong> In Stock</p>
            <a href="reservas.php" class="btn btn-primary">Reservar</a>
          </div>
        </div>
      </div> -->
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>