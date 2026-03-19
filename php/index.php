<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/index.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
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
        <form method="post" action='./insertion.php'>
            <label for="nom">Matricule</label><br>
            <input type="text" name="matricule" id="nom"><br>
            <label for="nom2">Noms</label><br>
            <input type="text" name="noms" id="nom2"><br>
            <label for="nom3">age</label><br>
            <input type="number" name="age" id="nom3"><br>
            <div >
                <label for="addition" class="label">
                    <input type="radio" name="sexe" id="addition" value="masculin"> <span>Masculin</span></label>
                <label for="sousstraction" class="label">
                    <input type="radio" name="sexe" id="sousstraction" value="feminin"> <span>Feminin</span> </label>
                <!-- <label for="division" class="label">
                    <input type="radio" name="signe" id="division" value="division"> <span>/</span></label>
                <label for="multiplication" class="label">
                    <input type="radio" name="signe" id="multiplication" value="multiplication"> <span>*</span> </label>
                <label for="modulo" class="label">
                    <input type="radio" name="signe" id="modulo" value="modulo"> <span>%</span></label> -->
                </div>
                <div class="buttons">
                    <button name="envoyer">Evoyer</button>
                    <button name='modifier'>Modifier</button>
                    <button name='supprimer'>Supprimer</button>
                </div>
        </form>

        <?php
        ?>

    </main>
    <footer>
        <a href="https://github.com/VATSU-tech/programmation_web_2">VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>

</html>