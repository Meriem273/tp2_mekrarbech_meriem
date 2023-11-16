<?php

//fonction de validation du nombre entré par l'utilisateur
function validateNumber($num_addresses)
{
    if (is_numeric($num_addresses) && $num_addresses > 0) {
        return true;
    } else {
        echo "entrez un nombre valide";
    }
}


//fonction de validation du nom de la rue
function validateStreet($street)
{
    if (is_string($street) && strlen($street) <= 50) {
        return true;
    } else {
        echo "entrez un nom de rue valide moins de 50 caractères svp";
    }
}


//fonction de validation du nombre de la rue
function validateStreetNumber($street_nb)
{
    if (is_numeric($street_nb)) {
        return true;
    } else {
        echo "entrez un nombre de rue valide";
    }
}


//fonction de validation du type d'adresse(j'ai utilisé un select ici)
function validateType($type)
{
    if (is_string($type) && strlen($type) <= 20) {
        return true;
    } else {
        echo "entrez un type valide";
    }
}


//fonction de validation du nom de ville
function validateCity($city)
{
    if (is_string($city)) {
        return true;
    } else {
        echo "entrez une ville valide";
    }
}


// fonction de validation du code postal
function validateZipCode($zip)
{
    if (is_string($zip) && strlen($zip) <= 6) {
        return true;
    } else {
        echo "entrez un zip valide moins de 6 caractères svp";
    }
}


//fonction de validation des données
function Enregistrement($db, $street, $street_nb, $type, $city, $zipcode)
{

    if (!validateStreet($street) || !validateStreetNumber($street_nb) || !validateType($type) || !validateCity($city) || !validateZipcode($zipcode)) {
        return false;
    }

    // Insertion dans la table
    $stmt = $db->prepare("INSERT INTO address (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");


    $stmt->bind_param("sisss", $street, $street_nb, $type, $city, $zipcode);

    // Exécution de la requête
    $result = $stmt->execute();

    // Fermer le statement
    $stmt->close();

    return $result;
}
