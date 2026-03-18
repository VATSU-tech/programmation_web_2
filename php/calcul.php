<?php
//recuperont cequi est dans le formulaire
$nom = $_POST['nom'];
$nom2 = $_POST['nom2'];

$signe = $_POST['signe'];

if($signe == "addition") {
    echo " \n la somme de ".$nom. " et ".$nom2. " est : ".($nom+$nom2);
} elseif ($signe == "sousstraction") {
    echo " \n la difference de ".$nom. " et ".$nom2. " est : ".($nom-$nom2);
} else {
    echo "Veuillez choisir une opération.";
}

// echo " \n la somme de ".$nom. " et ".$nom2. " est : ".($nom+$nom2);
?>