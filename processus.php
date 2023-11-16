<?php

require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traiter et enregistrer les données dans la base de données
    $conn = new mysqli($localhost, $address, $ecom1_tp2);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "Connected successfully";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numAddresses = $_POST["num_addresses"];
    
        // Parcourir toutes les adresses
        for ($i = 1; $i <= $numAddresses; $i++) {
            $street = $_POST["street_$i"];
            $street_nb = $_POST["street_nb_$i"];
            $type = $_POST["type_$i"];
            $city = $_POST["city_$i"];
            $zipcode = $_POST["zipcode_$i"];
    
            // Enregistrement des données dans la base de données
            $result = Enregistrement($conn, $street, $street_nb, $type, $city, $zipcode);
    
            if ($result) {
                echo "Adresse $i enregistrée avec succès.<br>";
            } else {
                echo "Erreur lors de l'enregistrement de l'adresse $i.<br>";
            }
        }
    }
    
    // Fermeture de la connexion à la base de données
    $conn->close();
} else {
    // Rediriger l'utilisateur vers index.php si l'accès direct à process_data.php est tenté sans passer par result.php
    header("Location: index.php");
    exit();
}

?>
