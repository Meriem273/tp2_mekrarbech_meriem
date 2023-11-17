<?php
require_once("functions.php");
require_once("config.php");

if (isset($_POST['submit'])) {
    if (validateStreet($_POST['street']) && validateStreetNumber($_POST['street_nb']) && validateType($_POST['type'])  && validateCity($_POST['city']) && validateZipCode($_POST['zipcode'])) {

        $street = $_POST["street"];
        $street_nb = $_POST["street_nb"];
        $type = $_POST["type"];
        $city = $_POST["city"];
        $zipcode = $_POST["zipcode"];


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "ecom1_tp2";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Pas de connexion dans la base de données');
        } else {
            $stmt = $db->prepare("INSERT INTO address (street, street_nb, type, city, zipcode) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("sisss", $street, $street_nb, $type, $city, $zipcode);
            $result = $stmt->execute();
            if ($result) {
                echo "Tout a été bien enregistré";
            } else {
                echo $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Tous les champs sont obligatoires";
        die();
    }
}
