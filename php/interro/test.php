<?php 
// Activation des erreurs pour le débogage
try {
    $connexion = new PDO("mysql:host=localhost;dbname=DB_crud_php",'root','', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Logique de traitement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $sexe = $_POST['sexe'];
    $nationalite = $_POST['nationalite'];
    $age = $_POST['age'];
    $tel = $_POST['telephone'];

    switch ($_POST['action']) {
        case 'enregistrer':
            $sql = "INSERT INTO t_etud(nom, sexe, nationalite, age, tel) VALUES(?, ?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$nom, $sexe, $nationalite, $age, $tel]);
            echo "Étudiant ajouté !";
            break;

        case 'modifier':
            if ($id) {
                $sql = "UPDATE t_etud SET nom=?, sexe=?, nationalite=?, age=?, tel=? WHERE id=?"; // Adaptez 'id' au nom de votre colonne clé primaire
                $stmt = $connexion->prepare($sql);
                $stmt->execute([$nom, $sexe, $nationalite, $age, $tel, $id]);
                echo "Mise à jour réussie !";
            }
            break;

        case 'supprimer':
            if ($id) {
                $sql = "DELETE FROM t_etud WHERE id=?";
                $stmt = $connexion->prepare($sql);
                $stmt->execute([$id]);
                echo "Étudiant supprimé !";
            }
            break;
    }
}
?>