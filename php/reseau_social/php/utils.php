<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function require_login(): void
{
    if (empty($_SESSION['connecter']) || $_SESSION['connecter'] !== true) {
        header('Location: ../pages/login.php');
        exit();
    }
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool
{
    if (empty($_SESSION['csrf_token'])) {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], (string) $token);
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}

function get_flash(): ?array
{
    if (empty($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
}

function redirect_back(string $fallback = '../pages/dashboard.php'): void
{
    $target = $fallback;
    if (!empty($_SERVER['HTTP_REFERER'])) {
        $target = $_SERVER['HTTP_REFERER'];
    }

    header('Location: ' . $target);
    exit();
}

function fetch_comments(PDO $connection, int $post_id): array
{
    $stmt = $connection->prepare(
        'SELECT c.*, u.username, u.firstname, u.lastname '
        . 'FROM comments c '
        . 'JOIN user u ON u.id = c.user_id '
        . 'WHERE c.post_id = ? '
        . 'ORDER BY c.id ASC'
    );
    $stmt->execute([$post_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
