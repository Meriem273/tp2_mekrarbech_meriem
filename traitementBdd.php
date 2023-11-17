<?php
require_once("functions.php");
require_once("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['submit'])) {
    

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
            $stmt = $conn->prepare("INSERT INTO address (street, street_nb, type, city, zipcode) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("sisss", $street, $street_nb, $type, $city, $zipcode);
            $result = $stmt->execute();
            if ($result) {
                echo "Tout a été bien enregistré";
                echo "street : " . $street . "<br>";
                echo 'street_nb : ' . $street_nb . '<br>';
                echo 'type : ' . $type . '<br>';
                echo 'city : ' . $city . '<br>';
                echo 'zipcode : ' . $zipcode . '<br>';
            } else {
                echo $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    }
}
