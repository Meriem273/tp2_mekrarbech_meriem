<?php
require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat</title>
</head>

<body>
    <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>

    <?php
    if (isset($_POST['submit'])) {
       

            $street = $_POST["street"];
            $street_nb = $_POST["street_nb"];
            $type = $_POST["type"];
            $city = $_POST["city"];
            $zipcode = $_POST["zipcode"];
            echo 'street : ' . $street . '<br>';
            echo 'street_nb : ' . $street_nb . '<br>';
            echo 'type : ' . $type . '<br>';
            echo 'city : ' . $city . '<br>';
            echo 'zipcode : ' . $zipcode . '<br>';
        }
    ?>
</body>

</html>