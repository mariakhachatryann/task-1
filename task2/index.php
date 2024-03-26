<?php
require_once "nav.php";

if (isset($_GET['action']) && $_GET['action'] === 'my_posts' && isset($_SESSION['admin'])) {
    $stmt = $connection->prepare(
            "SELECT p.*, a.username FROM posts AS p JOIN admins AS a ON p.admin_id = a.id WHERE p.admin_id = :admin_id ORDER BY p.created_at DESC"
    );
    $stmt->execute([':admin_id' => $_SESSION['admin']['id']]);
} else {
    $stmt = $connection->prepare(
            "SELECT p.*, a.username FROM posts AS p JOIN admins AS a ON p.admin_id = a.id ORDER BY p.created_at DESC"
    );
    $stmt->execute();
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <p class="title1">POSTS</p>
    <div class="posts">
        <?php foreach ($rows as $row): ?>
            <div class="post">
                <p class="post-title"><?= $row['title'] ?></p>
                <p><?= $row['text'] ?></p>
                <div class="post-details">
                    <span>Created by <?= $row['username'] ?></span>
                    <span><?= $row['created_at'] ?></span>
                </div>
                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']['id'] == $row['admin_id']): ?>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="edit-btn">Edit Post</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>