<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Trivago</title>
</head>
<body>
    <div class="container">
        <form action='main.php' method='post'>
        <div>
        <input type="text" class="text" placeholder="Usuario" name="email"><br>
        </div>
        <div>
        <input type="text" class="text" placeholder="Password" name="password">
        </div>
        
        <button type="submit" class="btn btn-success">Iniciar Sesion</button>
        <button type="button" class="btn btn-primary">Registrarse</button>
        </div>
        </form>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
<?php
include "./Scripts/conexion.php";
$usuario=$_POST['email'];
$passwd=$_POST['passwd'];
$consulta = "SELECT usuarios.email,usuarios.passwrd FROM alojamientos.usuarios where usuarios.email='$usuario' and usuarios.passwrd='$passwd'";
$query = $pdo->prepare($consulta);
$query->execute();
?>