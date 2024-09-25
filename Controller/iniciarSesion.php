<?php
session_start();
require_once '../Database/Database.php';
require_once '../Backend/Autenticacion.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Invalid email format';
    } else {
        $database = new Database();
        $db = $database->getConection();
        $auth = new Autenticacion();

        $esta_autenticado = $auth->login($db, $email, $password);

        if ($esta_autenticado) {
            // // Store user role in session
            // $_SESSION['is_admin'] = $esta_autenticado;

            if ($_SESSION['is_admin'] == 1) {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
            exit;
        } else {
            $error_message = 'Invalid email or password';
            error_log("Error: No se pudo autenticar al usuario.");
        }
    }
}
?>