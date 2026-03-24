<?php
require_once 'php/reseau_social/php/utils.php';

if (!empty($_SESSION['connecter']) && $_SESSION['connecter'] === true) {
    header('Location: php/reseau_social/pages/dashboard.php');
    exit();
}

header('Location: php/reseau_social/pages/login.php');
exit();
?>
