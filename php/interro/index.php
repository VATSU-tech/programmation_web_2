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
        <form method="post" action='./insertion.php'>
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
            <label for="age">Tel</label><br>
            <input type="number" name="tel" id="tel" placeholder="ex : +243 000 000 000"><br>
            
            <div class="buttons">
                <button name="envoyer">Evoyer</button>
                <button name='modifier'>Modifier</button>
                <button name='supprimer'>Supprimer</button>
                <button name='afficher'>afficher</button>
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