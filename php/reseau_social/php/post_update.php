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

$post_id = (int) ($_POST['post_id'] ?? 0);
$description = trim($_POST['description'] ?? '');
$image = trim($_POST['image'] ?? '');

if ($post_id <= 0 || $description === '') {
    set_flash('error', 'Données invalides.');
    redirect_back();
}

try {
    $ownerStmt = $connection->prepare('SELECT user_id FROM post WHERE id = ?');
    $ownerStmt->execute([$post_id]);
    $post = $ownerStmt->fetch(PDO::FETCH_ASSOC);

    if (!$post || (int) $post['user_id'] !== (int) $_SESSION['user_id']) {
        set_flash('error', 'Vous ne pouvez pas modifier ce post.');
        redirect_back();
    }

    $stmt = $connection->prepare('UPDATE post SET image = ?, description = ? WHERE id = ?');
    $stmt->execute([$image, $description, $post_id]);

    set_flash('success', 'Post modifié avec succès.');
} catch (Exception $e) {
    set_flash('error', "Erreur lors de la modification : " . $e->getMessage());
}

redirect_back();
?>
