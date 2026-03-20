<?php
include ("./connection.php");
if(isset($_POST["nom"]) && isset($_POST["categorie"]) && isset($_POST["pu"])){
    $nom = $_POST["nom"];
    $categorie = $_POST["categorie"];
    $pu = $_POST["pu"];
    //premiere methode d'insertion NB: deconseillée car elle est sujette à des attaques d'injection SQL
    // $requete = $connection->exec("INSERT INTO produit (nom, categorie, pu) VALUES ('$nom', '$categorie', $pu)");

    //deuxieme methode d'insertion NB: recommandée car elle utilise des requetes préparées et est moins sujette à des attaques d'injection SQL
    $requet = $connection->prepare("INSERT INTO produit (nom, categorie, pu) VALUES (?, ?, ?)");
    $requet->execute(array($nom, $categorie, $pu));
}
?>