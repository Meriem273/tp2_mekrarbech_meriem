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
?>
<form method="post" action="processus.php">
    <?php
    // Afficher les champs d'adresse en fonction du nombre entré par l'utilisateur
    for ($i = 1; $i <= $num_addresses; $i++) {
        echo "<h3>Adresse $i</h3>";
        echo "<label for='street_$i'>Rue:</label>";
        echo "<input type='text' id='street_$i' name='street_$i' required>";
        echo "<br>";
        echo "<label for='street_number_$i'>Numéro de rue:</label>";
        echo "<input type='number' id='street_number_$i' name='street_number_$i' required>";
        echo "<br>";

        // Ajoutez d'autres champs d'adresse ici
    }
    ?>
    <button type="submit" name="submit">Confirmer</button>
    <button type="modifier" name="modifier">Modifier</button>

</form>
<?php
} else {
    // Rediriger vers la page index.php si l'accès direct à result.php est tenté sans passer par index.php
    header("Location: form2.php");
    exit();
}
?>

</body>
</html>