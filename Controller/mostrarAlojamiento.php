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
    //header('Location: logIn2.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    header('Location: logIn2.php');
    exit();
    //si esta autenticado continuar con la reservation
  }
}
$database = new Database();

$db  = $database->getConection();

$alojamiento = Alojamiento::MostrarAlojamiento($db);



?>