<?php
include ("./connection.php");
if(isset($_POST["nom"]) && isset($_POST["categorie"]) && isset($_POST["pu"])){
    $nom = $_POST["nom"];
    $categorie = $_POST["categorie"];
    $pu = $_POST["pu"];
    $requete = $connection->prepare("INSERT INTO produit (nom, categorie, pu) VALUES (?, ?, ?)");
    $requete->execute(array($nom, $categorie, $pu));
}
?>