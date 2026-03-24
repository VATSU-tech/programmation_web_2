<?php
require_once './utils.php';
require_once './connexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_back('../pages/login.php');
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    set_flash('error', 'Veuillez renseigner votre email et votre mot de passe.');
    redirect_back('../pages/login.php');
}

try {
    $login = $connection->prepare('SELECT * FROM user WHERE email = ?');
    $login->execute([$email]);
    $user = $login->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['mot_de_passe'])) {
        set_flash('error', 'Nom d\'utilisateur ou mot de passe incorrect.');
        redirect_back('../pages/login.php');
    }

    session_regenerate_id(true);
    $_SESSION['email'] = $user['email'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['nationalite'] = $user['nationalite'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['sexe'] = $user['sexe'];
    $_SESSION['profil_link'] = $user['profil_img'] ?? '';
    $_SESSION['connecter'] = true;

    header('Location: ../pages/dashboard.php');
    exit();
} catch (Exception $e) {
    set_flash('error', 'Erreur lors de la connexion. Veuillez reessayer.');
    redirect_back('../pages/login.php');
}
?>
