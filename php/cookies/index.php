<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style/index.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookies</title>
</head>

<body>
    <header>
        <h1>Programmation web 2: sessions / cookies</h1>
    </header>
    <main>
        <form method="post" action='./login.php'>
            <label for="nom">Noms</label><br>
            <input type="text" name="nom" id="nom"><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password"><br>
            <!-- <label for="mail">Adresse mail</label><br>
            <input type="email" name="mail" id="mail"><br> -->
            <!-- <div >
                <label for="addition" class="label">
                    <input type="radio" name="sexe" id="addition" value="masculin"> <span>Masculin</span></label>
                <label for="sousstraction" class="label">
                    <input type="radio" name="sexe" id="sousstraction" value="feminin"> <span>Feminin</span> </label>
                </div> -->
                <div class="buttons">
                    <button name="envoyer">Evoyer</button>
                    <!-- <button name='modifier'>Modifier</button>
                    <button name='supprimer'>Supprimer</button> -->
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