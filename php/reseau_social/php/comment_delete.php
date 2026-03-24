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

$comment_id = (int) ($_POST['comment_id'] ?? 0);
if ($comment_id <= 0) {
    set_flash('error', 'Données invalides.');
    redirect_back();
}

try {
    $ownerStmt = $connection->prepare('SELECT user_id FROM comments WHERE id = ?');
    $ownerStmt->execute([$comment_id]);
    $comment = $ownerStmt->fetch(PDO::FETCH_ASSOC);

    if (!$comment || (int) $comment['user_id'] !== (int) $_SESSION['user_id']) {
        set_flash('error', 'Vous ne pouvez pas supprimer ce commentaire.');
        redirect_back();
    }

    $stmt = $connection->prepare('DELETE FROM comments WHERE id = ?');
    $stmt->execute([$comment_id]);

    set_flash('success', 'Commentaire supprimé.');
} catch (Exception $e) {
    set_flash('error', "Erreur lors de la suppression : " . $e->getMessage());
}

redirect_back();
?>
