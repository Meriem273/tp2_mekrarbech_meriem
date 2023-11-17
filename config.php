<?php           
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "ecom1_tp2";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if ($conn === false) {
        die("Pas de connexion dans la base de données");
    }
?>