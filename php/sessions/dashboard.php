<?php session_start(); ?>
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
        <h1>Dashboard</h1>
    </header>
    <main>
        <h1>Nom d'utilisateur : <?php echo $_SESSION['username'];  ?></h1>
    </main>
    <footer>
        <a href="https://github.com/VATSU-tech/programmation_web_2">VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>

</html>