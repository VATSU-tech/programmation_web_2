<?php
require_once '../php/utils.php';
$flash = get_flash();
$username = $_SESSION['username'] ?? '';
$profil_link = $_SESSION['profil_link'] ?? '';
$email = $_SESSION['email'] ?? '';
$alt = $username !== '' ? $username : 'Photo de profil';
?>
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
        <?php if (!empty($flash)) { ?>
            <div class="flash <?php echo e($flash['type']); ?>">
                <?php echo e($flash['message']); ?>
            </div>
        <?php } ?>

        <form method="post" action="../php/login_action.php">
            <div class="login_img">
                <?php if ($profil_link !== '') { ?>
                    <img style="height: 100%;" src="<?php echo e($profil_link); ?>" alt="<?php echo e($alt); ?>">
                <?php } ?>
            </div><br>
            <div style="margin: auto;">
                <h2>Bienvenue <?php if ($username !== '') { ?><span style="color: var(--color);"><?php echo e($username); ?></span><?php } ?></h2>
            </div><br>
            <label for="email">Adresse mail</label><br>
            <input type="email" required name="email" id="email" value="<?php echo e($email); ?>"><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" required name="password" id="password"><br>
            <div class="buttons">
                <button name="envoyer">Se connecter</button>
            </div>
            <span>pas de compte <a href="signup.php">S'inscrire</a></span>
        </form>
    </main>
    <footer>
        <a class="git" href="https://github.com/VATSU-tech/programmation_web_2">&COPY; VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>

</html>
