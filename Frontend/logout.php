<?php
session_start();
require_once '../Backend/Autenticacion.php';

$auth = new Autenticacion();
$auth->logout();

header('Location: index.php'); // Redirigir a la landing después de cerrar sesión
exit;
