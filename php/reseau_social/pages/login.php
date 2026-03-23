<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
</head>

<body>
    <header>
        <h1>CONNECTION</h1>
    </header>
    <main>
        <form method="post" action='./login.php'>
            <label for="nom">Noms</label><br>
            <input type="text" name="nom" id="nom"><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password"><br>
                <div class="buttons">
                    <button name="envoyer">Se connecter</button>
                </div>
                <span>pas de compte <a href="signup.php">S'inscrire</a></span>
        </form>

        <?php
        ?>

    </main>
    <footer>
        <a class="git" href="https://github.com/VATSU-tech/programmation_web_2">&COPY; VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>

</html>