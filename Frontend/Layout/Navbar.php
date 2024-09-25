<div class="container-fluid pb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <p class="fs-1 font-bold">Alojamientos</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservacionesCliente.php">Reservaciones</a>
                    </li>
            </div>

            <div class="login-container">
                <div class="d-flex">
                    <?php
                    if ($auth->estaAutenticado()) {
                        // Si el usuario está autenticado, mostrar "Cerrar sesión"
                        echo '<a href="../../Controller/logout.php" class="btn btn-danger ms-auto">Cerrar Sesión</a>';
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