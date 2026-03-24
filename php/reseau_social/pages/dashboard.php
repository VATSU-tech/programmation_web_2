<!DOCTYPE html>
<html lang="fr">
<?php
require_once '../php/utils.php';
require_login();
require_once '../php/connexion.php';

$token = csrf_token();
$flash = get_flash();
$posts = [];

try {
    $stmt = $connection->query(
        'SELECT p.*, u.username, u.firstname, u.lastname '
        . 'FROM post p '
        . 'JOIN user u ON u.id = p.user_id '
        . 'ORDER BY p.id DESC'
    );
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    set_flash('error', 'Erreur lors du chargement des posts.');
}
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>

<body>
    <header>
        <h1><?php echo e(ucfirst($_SESSION['firstname']) . ' ' . ucfirst($_SESSION['lastname'])); ?></h1>
        <button><a href="../php/deconnexion.php">Se deconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a></button>
    </header>
    <main class="feed">
        <h1>Bienvenue <?php echo e($_SESSION['username']); ?></h1>

        <?php if (!empty($flash)) { ?>
            <div class="flash <?php echo e($flash['type']); ?>">
                <?php echo e($flash['message']); ?>
            </div>
        <?php } ?>

        <section class="new-post">
            <h2>Creer un post</h2>
            <form method="post" action="../php/post_create.php">
                <input type="hidden" name="csrf_token" value="<?php echo e($token); ?>">
                <label for="post-image">Image (URL)</label>
                <input type="url" name="image" id="post-image" placeholder="https://...">
                <label for="post-description">Description</label>
                <textarea name="description" id="post-description" rows="4" placeholder="Que voulez-vous partager ?" required></textarea>
                <button type="submit">Publier</button>
            </form>
        </section>

        <section class="posts">
            <h2>Fil d'actualite</h2>
            <?php if (empty($posts)) { ?>
                <p class="empty">Aucun post pour le moment.</p>
            <?php } ?>

            <?php foreach ($posts as $post) { ?>
                <?php $comments = fetch_comments($connection, (int) $post['id']); ?>
                <article class="post">
                    <div class="post-header">
                        <div>
                            <strong><?php echo e($post['username']); ?></strong>
                            <span class="post-name">(<?php echo e($post['firstname'] . ' ' . $post['lastname']); ?>)</span>
                        </div>
                        <span class="post-date"><?php echo e($post['date_creation']); ?></span>
                    </div>

                    <p class="post-description"><?php echo e($post['description']); ?></p>

                    <?php if (!empty($post['image'])) { ?>
                        <img class="post-image" src="<?php echo e($post['image']); ?>" alt="Image du post">
                    <?php } ?>

                    <?php if ((int) $post['user_id'] === (int) $_SESSION['user_id']) { ?>
                        <details class="post-edit">
                            <summary>Modifier le post</summary>
                            <form method="post" action="../php/post_update.php" class="inline-form">
                                <input type="hidden" name="csrf_token" value="<?php echo e($token); ?>">
                                <input type="hidden" name="post_id" value="<?php echo e($post['id']); ?>">
                                <label for="post-image-<?php echo e($post['id']); ?>">Image (URL)</label>
                                <input type="url" name="image" id="post-image-<?php echo e($post['id']); ?>" value="<?php echo e($post['image']); ?>">
                                <label for="post-description-<?php echo e($post['id']); ?>">Description</label>
                                <textarea name="description" id="post-description-<?php echo e($post['id']); ?>" rows="3" required><?php echo e($post['description']); ?></textarea>
                                <button type="submit">Enregistrer</button>
                            </form>
                        </details>
                        <form method="post" action="../php/post_delete.php" class="inline-form">
                            <input type="hidden" name="csrf_token" value="<?php echo e($token); ?>">
                            <input type="hidden" name="post_id" value="<?php echo e($post['id']); ?>">
                            <button type="submit" class="danger">Supprimer</button>
                        </form>
                    <?php } ?>

                    <div class="comments">
                        <h3>Commentaires</h3>
                        <?php if (empty($comments)) { ?>
                            <p class="empty">Aucun commentaire.</p>
                        <?php } ?>

                        <?php foreach ($comments as $comment) { ?>
                            <div class="comment">
                                <div class="comment-header">
                                    <strong><?php echo e($comment['username']); ?></strong>
                                    <span><?php echo e($comment['date_creation']); ?></span>
                                </div>
                                <p><?php echo e($comment['contenue']); ?></p>

                                <?php if ((int) $comment['user_id'] === (int) $_SESSION['user_id']) { ?>
                                    <details class="comment-edit">
                                        <summary>Modifier</summary>
                                        <form method="post" action="../php/comment_update.php" class="inline-form">
                                            <input type="hidden" name="csrf_token" value="<?php echo e($token); ?>">
                                            <input type="hidden" name="comment_id" value="<?php echo e($comment['id']); ?>">
                                            <textarea name="contenue" rows="2" required><?php echo e($comment['contenue']); ?></textarea>
                                            <button type="submit">Enregistrer</button>
                                        </form>
                                    </details>
                                    <form method="post" action="../php/comment_delete.php" class="inline-form">
                                        <input type="hidden" name="csrf_token" value="<?php echo e($token); ?>">
                                        <input type="hidden" name="comment_id" value="<?php echo e($comment['id']); ?>">
                                        <button type="submit" class="danger">Supprimer</button>
                                    </form>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <form method="post" action="../php/comment_create.php" class="comment-form">
                            <input type="hidden" name="csrf_token" value="<?php echo e($token); ?>">
                            <input type="hidden" name="post_id" value="<?php echo e($post['id']); ?>">
                            <label for="comment-<?php echo e($post['id']); ?>">Ajouter un commentaire</label>
                            <textarea name="contenue" id="comment-<?php echo e($post['id']); ?>" rows="2" required></textarea>
                            <button type="submit">Commenter</button>
                        </form>
                    </div>
                </article>
            <?php } ?>
        </section>
    </main>
    <footer>
        <a class="git" data-hover="acceder au code source" href="https://github.com/VATSU-tech/programmation_web_2">&COPY; VATSU-tech <i class="fa-brands fa-github"></i></a>
    </footer>
</body>
</html>
