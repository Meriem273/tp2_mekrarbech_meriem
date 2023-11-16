<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat</title>
    <link rel="stylesheet" href="style2.css">
</head>
<?php
require_once("functions.php");
?>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer le nombre d'adresses de la première page
        $num_addresses = $_POST["num_addresses"];
        $street = $_POST["street"];
        $street_nb = $_POST["street_nb"];
        $city = $_POST["city"];
        $type = $_POST["type"];
        $zipcode = $_POST["zipcode"];


        if (validateStreet($street) === true || validateStreetNumber($street_nb) === true || validateCity($city) === true || validateType($type) === true || validateZipCode($zipcode)) {
    ?>
            <form method="post" action="result.php">
                <?php
                // Afficher les champs d'adresse en fonction du nombre entré par l'utilisateur
                for ($i = 1; $i <= $num_addresses; $i++) {
                    echo "<p>Nom de rue : $street </p>";
                    echo "<p>Numero de rue : $street_nb </p>";
                    echo "<p>Type : $type </p>";
                    echo "<p>Ville : $city </p>";
                    echo "<p>ZipCode : $zipcode </p>";
                }
                ?>
                <button type="submit" name="submit">Confirmer</button>
                <button type="modifier" name="modifier">Modifier</button>

            </form>
        <?php
        } else {
            header("Location: result.php");
            exit();
        }
        ?>
    <?php } ?>
</body>

</html>