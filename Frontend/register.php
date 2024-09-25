<?php
require_once '../Database/Database.php';
require_once '../Backend/Usuario.php';
require_once '../Backend/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Crear una instancia de Cliente
    $cliente = new Cliente(null, $username, $apellido, $email, $password);

    // Conexión a la base de datos
    $database = new Database();
    $db = $database->getConection();

    // Intentar crear el usuario en la base de datos
    if ($cliente->crearUsuario($db)) {
        // Redirigir al usuario a la página de inicio
        header('Location: login2.php');
        exit;
    } else {
        echo "Error al crear la cuenta. Por favor, inténtelo de nuevo.";
    }
}
?>