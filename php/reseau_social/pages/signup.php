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
        <form method="post" action='../php/getData.php'>
            <label for="nom">Nom</label><br>
            <input required placeholder="ex : KATSUVA" type="text" name="firstname" id="nom"><br>
            <label for="postnom">Post-nom</label><br>
            <input required placeholder="ex : MALAMBO" type="text" name="secondname" id="postnom"><br>
            <label for="username">Nom d'utilisateur</label><br>
            <input required placeholder="ex : vatsu04" type="text" name="username" id="username"><br>
            <label for="password">Mot de passe</label><br>
            <input required placeholder="ex : 123456789" type="password" name="password" id="password"><br>
            <div class="password_strong"><div></div></div><br>
            <label for="date">Date de naissance</label><br>
            <input required type="date" name="date_naissance" id="date"><br>
            <div class="radio">
                <span>Genre : </span>
                <label for="masculin" class="label">
                    <input  type="radio" name="sexe" checked id="masculin" value="masculin"> <span> Masculin</span></label>
                <label for="feminin" class="label">
                    <input  type="radio" name="sexe" id="feminin" value="feminin"> <span>Feminin</span> </label>
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
            <input required placeholder="ex : +243 123 456 789" type="number" name="phone" id="phone"><br>
            <label for="mail">Adresse mail</label><br>
            <input required placeholder="ex : katsuvamalambo@gmail.com" type="email" name="mail" id="mail"><br>
            <label for="image">Lien vers votre photo de profil</label><br>
            <input required placeholder="ex : https://imgs.search.brave.com/XENzzkpmqJrBXcc0iNdOTOQY5sZuC0FApYFwp2Z8Srs/rs:fit:0:180:1:0/g:ce/aHR0cHM6Ly93d3cu/eWJpZXJsaW5nLmNv/bS9pbWFnZXMvbWVk/aXVtL3dlYi9hZGRm/b3JlaWdua2V5cGhw/bXlhZG1pbi9hZGRm/b3JlaWdua2V5cGhw/bXlhZG1pbjEucG5n" type="url" name="prifil_img" id="image"><br>
                <div class="buttons">
                    <button name="inscription">S'inscrire</button>
                </div>
                <span>j'ai un compte <a href="login.php">Se connecter</a></span>
        </form>
    </main>
    <footer>
        <a class="git" href="https://github.com/VATSU-tech/programmation_web_2">&COPY; VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>

</html>