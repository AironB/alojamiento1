<?php
require_once '../Database/Database.php';

session_start();

if(isset($_POST['submit'])){
   
    // Asegúrate de tener una conexión establecida
    $conn = $database->getConection();

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
 
    // Línea corregida: mysqli_query en lugar de mysqli_qu
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
 
       $row = mysqli_fetch_assoc($select_users);
 
       if(mysqli_num_rows($select_users) > 0){
        $row = mysqli_fetch_assoc($select_users);
     
        if($row['user_type'] == 1){ // Administrador
           $_SESSION['admin_name'] = $row['name'];
           $_SESSION['admin_email'] = $row['email'];
           $_SESSION['admin_id'] = $row['id'];
           header('location:admin_page.php');
        } elseif($row['user_type'] == 0){ // Cliente
           $_SESSION['user_name'] = $row['name'];
           $_SESSION['user_email'] = $row['email'];
           $_SESSION['user_id'] = $row['id'];
           header('location:home.php');
        }
     } else {
        $message[] = 'incorrect email or password!';
     }
     
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 22rem;">
            <h2 class="text-center mb-4">Log In</h2>
            <form>
                <div class="mb-3">
                    <label for="email"  class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Log In</button>
                <div class="mt-3 text-center">
                    <span>Don't have an account?</span> <a href="signUp.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>