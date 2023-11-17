<?php
require_once("functions.php");
?>
<?php
if (isset($_POST['submit'])) {
    $num_addresses = $_POST["num_addresses"];
    //si le nombre est valide on entame le processus d'entrée des adresses
    if (validateNumber($num_addresses) === true) { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <title>Formulaire d'adresses</title>
            <link rel="stylesheet" href="style2.css">
        </head>

        <body>
            <form action="result.php" method="post">
                <!--repetition des adresses par rapport au nombre entré par l'utilisateur -->
                <?php
                for ($i = 1; $i <= $num_addresses; $i++) {
                ?>
                    <div class="address">
                        <label for="street<?= $i ?>">Nom de la rue:</label>
                        <input type="text" id="street<?= $i ?>" name="street<?= $i ?>" required>

                        <label for="street_nb<?= $i ?>">Numero de la rue:</label>
                        <input type="text" id="street_nb<?= $i ?>" name="street_nb<?= $i ?>" required>

                        <label for="type<?= $i ?>">Type d'adresse:</label>
                        <select id="type<?= $i ?>" name="type<?= $i ?>">
                            <option value="livraison">Livraison</option>
                            <option value="facturation">Facturation</option>
                            <option value="domicile">Domicile</option>
                            <option value="travail">Travail</option>
                            <option value="autre">Autre</option>
                        </select>

                        <label for="city<?= $i ?>">Ville:</label>
                        <input type="text" id="city<?= $i ?>" name="city<?= $i ?>" required>

                        <label for="zipcode<?= $i ?>">Code postal:</label>
                        <input type="text" id="zipcode<?= $i ?>" name="zipcode<?= $i ?>" required>
                    </div>
                <?php
                }
                ?>
                <button type="submit" name="submit">Confirmer</button>
            </form>
        <?php
    }
        ?>
    <?php
} ?>
        </body>

        </html>