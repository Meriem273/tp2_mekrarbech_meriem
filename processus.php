<?php

require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // connexion à la base de données
    $conn = new mysqli('localhost', "root", "ecom1_tp2");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully";
    }


    // Boucle pour insérer les données dans la base de données
    for ($i = 1; $i <= $num_addresses; $i++) {
        if (isset($_POST["street_$i"])) {
            $street = $_POST["street_$i"];
            $street_nb = $_POST["street_nb_$i"];
            $type = $_POST["type_$i"];
            $city = $_POST["city_$i"];
            $zipcode = $_POST["zipcode_$i"];

            $stmt = $db->prepare("INSERT INTO address (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");


            $stmt->bind_param("sisss", $street, $street_nb, $type, $city, $zipcode);

            // Exécution de la requête
            $result = $stmt->execute();

            // Fermer le statement
            $stmt->close();

            return $result;
        }
    }

}
