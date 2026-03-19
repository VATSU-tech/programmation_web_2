<?php
include ("./connection.php");
if(isset($_POST["nom"]) && isset($_POST["categorie"]) && isset($_POST["pu"])){
    $nom = $_POST["nom"];
    $categorie = $_POST["categorie"];
    $pu = $_POST["pu"];
    $requete = $connection->exec("INSERT INTO produit (nom, categorie, pu) VALUES ('$nom', '$categorie', $pu)");
    // $requete->exec(array($nom, $categorie, $pu));
}
?>