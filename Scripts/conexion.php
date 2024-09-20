<?php
    $host = 'localhost';
    $dbname = 'alojamientos';
    $username = 'root';
    $password = 'Subaru209$$';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        //echo "Connected to $dbname at $host successfully.";
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>