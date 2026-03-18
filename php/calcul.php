<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/index.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>    
    <header>
        <h1>Programmation web 2</h1>
    </header>
    <main>
        <form action="php/calcul.php" method="post">
            <label for="nom">Salaire</label><br>
            <input type="number" name="nom" id="nom"><br>
            <label for="nom2">pourcentage d'impot</label><br>
            <input type="number" name="nom2" id="nom2"><br>
            <label for="nom3">pourcentage de contribution</label><br>
            <input type="number" name="nom3" id="nom3"><br>
            <div style="display: none;">
                <label for="addition" class="label">
                <input type="radio" name="signe"  id="addition"  value="addition"> <span>+</span></label>
                <label for="sousstraction" class="label">
                <input type="radio" name="signe" id="sousstraction"  value="sousstraction"> <span>-</span> </label>
                <label for="division" class="label">
                <input type="radio" name="signe" id="division"  value="division"> <span>/</span></label>
                <label for="multiplication" class="label">
                <input type="radio" name="signe" id="multiplication"  value="multiplication"> <span>*</span> </label>
                <label for="modulo" class="label">
                <input type="radio" name="signe" id="modulo"  value="modulo"> <span>%</span></label>
            </div>
            <button type="submit" >calculer</button>  
        </form>
        <div class="resultat">
            <span>vos impot sont de <span class="prix">00.0%</span></span><br>
            <span>votre contribution est de <span class="prix">00.0%</span></span><br>
            <span>votre salaire net est de <span class="prix">00.0Fc</span></span>
        </div>
    </main>
    <footer>
        <a href="https://github.com/VATSU-tech/programmation_web_2">VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>
</html>
<?php
//recuperont cequi est dans le formulaire
// echo " la somme de ".$nom. " et ".$nom2. " est : ".($nom+$nom2);
?>