<!DOCTYPE html>
<html lang="fr">
<?php session_start(); 
if($_SESSION['connecter'] !== true) {
    header('location: login.php');
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>

<body>
    <header>
        <h1><?php echo ucfirst($_SESSION['firstname']).' '.ucfirst($_SESSION['lastname']) ?></h1>
        <button><a href="../php/deconnexion.php">Se deconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a></button>
    </header>
    <main>
        <h1>Bienvenue <?php echo $_SESSION['username'] ?></h1>
    </main>
    <footer>
        <a class="git" data-hover="acceder au code source" href="https://github.com/VATSU-tech/programmation_web_2">&COPY; VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>
</html>