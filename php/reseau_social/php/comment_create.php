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
$contenue = trim($_POST['contenue'] ?? '');

if ($post_id <= 0 || $contenue === '') {
    set_flash('error', 'Données invalides.');
    redirect_back();
}

try {
    $postStmt = $connection->prepare('SELECT id FROM post WHERE id = ?');
    $postStmt->execute([$post_id]);

    if (!$postStmt->fetch(PDO::FETCH_ASSOC)) {
        set_flash('error', 'Le post n\'existe pas.');
        redirect_back();
    }

    $stmt = $connection->prepare(
        'INSERT INTO comments (post_id, user_id, contenue, date_creation) VALUES (?, ?, ?, CURDATE())'
    );
    $stmt->execute([
        $post_id,
        $_SESSION['user_id'],
        $contenue,
    ]);

    set_flash('success', 'Commentaire ajouté.');
} catch (Exception $e) {
    set_flash('error', "Erreur lors de l\'ajout : " . $e->getMessage());
}

redirect_back();
?>
