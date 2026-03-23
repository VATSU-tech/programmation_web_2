<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>

<body>
    <header>
        <h1>INSCRIPTION</h1>
    </header>
    <main>
        <form method="post" action='./login.php'>
            <label for="nom">Noms</label><br>
            <input type="text" name="username" id="nom"><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password"><br>
            <label for="date">Date de naissance</label><br>
            <input type="date" name="date_naissance" id="date"><br>
            <div class="radio">
                <span>Genre : </span>
                <label for="masculin" class="label">
                    <input type="radio" name="sexe" checked id="masculin" value="masculin"> <span> Masculin</span></label>
                <label for="feminin" class="label">
                    <input type="radio" name="sexe" id="feminin" value="feminin"> <span>Feminin</span> </label>
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
            <label for="phone">Telephone</label><br>
            <input type="number" name="phone" id="phone"><br>
            <label for="mail">Adresse mail</label><br>
            <input type="email" name="mail" id="mail"><br>
            <label for="image">Lien vers votre photo de profil</label><br>
            <input type="url" name="image_link" id="image"><br>
                <div class="buttons">
                    <button name="envoyer">S'inscrire</button>
                </div>
                <span>j'ai un compte <a href="login.php">Se connecter</a></span>
        </form>

        <?php
        ?>

    </main>
    <footer>
        <a class="git" href="https://github.com/VATSU-tech/programmation_web_2">&COPY; VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>

</html>