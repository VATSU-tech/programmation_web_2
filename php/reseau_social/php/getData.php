<?php 
if(isset($_POST["firstname"]) && $_POST["secondname"] && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["date_naissance"]) && isset($_POST["sexe"]) && isset($_POST["nationalite"]) && isset($_POST["phone"]) && isset($_POST["profil_img"]) && isset($_POST["mail"])){
    echo 'succes';
    } else echo'Erreur lors de la recuperation des donnees';
?>