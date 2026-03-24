<?php
require_once './utils.php';
require_once './connexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_back('../pages/signup.php');
}

$firstname = trim($_POST['firstname'] ?? '');
$lastname = trim($_POST['lastname'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$dateNaissance = $_POST['date_naissance'] ?? '';
$sexe = $_POST['sexe'] ?? '';
$nationalite = $_POST['nationalite'] ?? '';
$phone = trim($_POST['phone'] ?? '');
$profil_link = trim($_POST['profil_img'] ?? '');
$email = trim($_POST['mail'] ?? '');

if (
    $firstname === '' ||
    $lastname === '' ||
    $username === '' ||
    $password === '' ||
    $dateNaissance === '' ||
    $sexe === '' ||
    $nationalite === '' ||
    $phone === '' ||
    $profil_link === '' ||
    $email === ''
) {
    set_flash('error', 'Veuillez remplir tous les champs du formulaire.');
    redirect_back('../pages/signup.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    set_flash('error', 'Adresse email invalide.');
    redirect_back('../pages/signup.php');
}

if (strlen($password) < 6) {
    set_flash('error', 'Le mot de passe doit contenir au moins 6 caracteres.');
    redirect_back('../pages/signup.php');
}

try {
    $check = $connection->prepare('SELECT id FROM user WHERE email = ? OR username = ?');
    $check->execute([$email, $username]);

    if ($check->fetch(PDO::FETCH_ASSOC)) {
        set_flash('error', 'Cet email ou ce nom d\'utilisateur est deja utilise.');
        redirect_back('../pages/signup.php');
    }

    $requet = $connection->prepare(
        'INSERT INTO user '
        . '(firstname, lastname, username, profil_img, date_naissance, sexe, nationalite, phone, email, mot_de_passe) '
        . 'VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );
    $requet->execute([
        $firstname,
        $lastname,
        $username,
        $profil_link,
        $dateNaissance,
        $sexe,
        $nationalite,
        $phone,
        $email,
        password_hash($password, PASSWORD_DEFAULT),
    ]);

    $_SESSION['username'] = $username;
    $_SESSION['profil_link'] = $profil_link;
    $_SESSION['email'] = $email;

    set_flash('success', 'Compte cree avec succes. Vous pouvez vous connecter.');
    header('Location: ../pages/login.php');
    exit();
} catch (Exception $e) {
    set_flash('error', 'Erreur lors de la creation du compte.');
    redirect_back('../pages/signup.php');
}
?>
