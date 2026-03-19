<?php
include ('./traitement.php');
if (isset($_POST['matricule']) && isset($_POST['noms']) && isset($_POST['age']) && isset($_POST['sexe'])) {
    $matricule = $_POST['matricule'];
    $noms = $_POST['noms'];
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $insertion = $connexion->prepare("INSERT INTO etudiant (matricule, noms, age, sexe) VALUES (?, ?, ?, ?)");
    $insertion->execute(array($matricule, $noms, $age, $sexe));
    $insertion->bindParam(':matricule', $matricule);
    $insertion->bindParam(':noms', $noms);
    $insertion->bindParam(':age', $age);
    $insertion->bindParam(':sexe', $sexe);
    if ($insertion->execute()) {
        echo "<h2 class='success'>Insertion réussie</h2>";
    } else {
        echo "<h2 class='error'>Erreur lors de l'insertion</h2>";
    }
}
?>