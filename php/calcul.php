<?php
//recuperont cequi est dans le formulaire
$nom = $_GET['nom'];
$nom2 = $_GET['nom2'];

echo "la somme de ".$nom. " et ".$nom2. " est : ".($nom+$nom2);
?>