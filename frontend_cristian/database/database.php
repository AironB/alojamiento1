<?php

// Database loggin credentials!!!

$host = 'localhost';
$port = '3306';
$db_name = 'alojamiento_db';
$username = '';
$password = '';

$dsn = "mysql:host={$host};port={$port};dbname={$db_name};charset=utf8";

try {


    // Create a PDO intance    
    $pdo = new PDO($dsn, $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch as Associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

