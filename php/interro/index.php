<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style/index.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>

<body>
    <header>
        <h1>Programmation web 2</h1>
    </header>
    <main>
        <form method="post" action=''>
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom" placeholder="ex : KATSUVA MALAMBO VATSU"><br>
            <div class="radio">
                <label for="addition" class="label">
                    <input type="radio" name="sexe" checked id="addition" value="masculin"> <span>Masculin</span></label>
                <label for="sousstraction" class="label">
                    <input type="radio" name="sexe" id="sousstraction" value="feminin"> <span>Feminin</span> </label>
            </div><br>
            <label for="nationalite">Nationalite</label><br>
            <select name="nationalite" id="nationalite">
                <option value="congolais">Congolais</option>
                <option value="ugandais">Ugandais</option>
                <option value="malien">Malien</option>
                <option value="camerounais">Camerounais</option>
                <option value="togolais">Togolais</option>
                <option value="buroundais">Buroundais</option>
            </select><br>
            <!-- <input type="select" name="categorie" id="nom2"><br> -->
            <label for="age">age</label><br>
            <input type="number" name="age" id="age" placeholder="ex : 21"><br>
            <label for="telephone">Telephone</label><br>
            <input type="number" name="telephone" id="telephone" placeholder="ex : +243 000 000 000"><br>
            
            <div class="buttons">
                <button name="action" value="enregistrer">Enregistrer</button>
                <button name='action' value="modifier">Modifier</button>
                <button name='action' value="supprimer">Supprimer</button>
            </div>
        </form>
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

    </main>
    <footer>
        <a href="https://github.com/VATSU-tech/programmation_web_2">VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>

</html>