<?php
//para el login.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new Autenticacion(); // Clase de autenticación
    if ($auth->login($db, $email, $password)) {
        // Redirigir según el rol del usuario
        if ($auth->isAdmin()) {
            header('Location: #'); // Vista del administración
        } else {
            header('Location: #'); // Vista del cliente
        }
    } else {
        // Mostrar un mensaje de error usando SweetAlert
        echo "<script>Swal.fire('Login failed', 'Incorrect credentials', 'error');</script>";
    }
}



?>