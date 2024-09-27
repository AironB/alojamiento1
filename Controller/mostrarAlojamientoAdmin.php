<?php
session_start();
require_once '../Database/Database.php';
require_once '../Backend/Autenticacion.php';
require_once '../Backend/TipoAlojamiento.php';
require_once '../Backend/Alojamiento.php';


$database = new Database();

$db  = $database->getConection();
$auth = new Autenticacion();


if (!$auth->estaAutenticado()) {
    //redirigir a login si no esta autenticado
    header('Location: logIn2.php');
    exit();
}

$alojamiento = Alojamiento::MostrarAlojamiento($db);
