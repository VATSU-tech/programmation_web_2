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
if ($post_id <= 0) {
    set_flash('error', 'Données invalides.');
    redirect_back();
}

try {
    $ownerStmt = $connection->prepare('SELECT user_id FROM post WHERE id = ?');
    $ownerStmt->execute([$post_id]);
    $post = $ownerStmt->fetch(PDO::FETCH_ASSOC);

    if (!$post || (int) $post['user_id'] !== (int) $_SESSION['user_id']) {
        set_flash('error', 'Vous ne pouvez pas supprimer ce post.');
        redirect_back();
    }

    $connection->beginTransaction();

    $deleteComments = $connection->prepare('DELETE FROM comments WHERE post_id = ?');
    $deleteComments->execute([$post_id]);

    $deletePost = $connection->prepare('DELETE FROM post WHERE id = ?');
    $deletePost->execute([$post_id]);

    $connection->commit();

    set_flash('success', 'Post supprimé avec succès.');
} catch (Exception $e) {
    if ($connection->inTransaction()) {
        $connection->rollBack();
    }
    set_flash('error', "Erreur lors de la suppression : " . $e->getMessage());
}

redirect_back();
?>
