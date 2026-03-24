<?php
require_once './utils.php';
require_login();
require_once './connexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_back();
}

if (!verify_csrf($_POST['csrf_token'] ?? null)) {
    set_flash('error', 'Jeton CSRF invalide.');
    redirect_back();
}

$description = trim($_POST['description'] ?? '');
$image = trim($_POST['image'] ?? '');

if ($description === '') {
    set_flash('error', 'La description est obligatoire.');
    redirect_back();
}

try {
    $stmt = $connection->prepare(
        'INSERT INTO post (user_id, image, description, date_creation) VALUES (?, ?, ?, CURDATE())'
    );
    $stmt->execute([
        $_SESSION['user_id'],
        $image,
        $description,
    ]);

    set_flash('success', 'Post publié avec succès.');
} catch (Exception $e) {
    set_flash('error', "Erreur lors de la publication : " . $e->getMessage());
}

redirect_back();
?>
