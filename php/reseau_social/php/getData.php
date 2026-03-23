<?php
if (isset($_POST["firstname"]) && $_POST["lastname"] && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["date_naissance"]) && isset($_POST["sexe"]) && isset($_POST["nationalite"]) && isset($_POST["phone"]) && isset($_POST["profil_img"]) && isset($_POST["mail"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $dateNaissance = $_POST["date_naissance"];
    $sexe = $_POST["sexe"];
    $nationalite = $_POST["nationalite"];
    $profil_link = $_POST["profil_img"];

    echo $firstname." ".$lastname." ".$email." ".$password." ".$phone." ".$sexe." ".$nationalite." ".$profil_link;
} else
    echo 'Erreur lors de la recuperation des donnees';
?>