<?php
require_once '../Backend/Usuario.php';
require_once '../Backend/Cliente.php';
require_once '../Database/Database.php';

// Simular datos para un nuevo cliente
$nombre = 'Adrian';
$apellido = 'Perez';
$email = 'adrian.perez@example.com';
$password = '12345612';

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConection();

// Crear un nuevo cliente (pasamos null para id_usuario porque es autogenerado)
$cliente = new Cliente(null, $nombre, $apellido, $email, $password);

// Intentar registrar el usuario en la base de datos
if ($cliente->crearUsuario($db)) {
    echo "Usuario registrado exitosamente\n";
} else {
    echo "Error al registrar usuario\n";
}
