<?php
//require_once '../nav.php';
require_once '../controllers/PostController.php';

$controller = new PostController();
$posts = $controller->index();
?>

<div id="box">
    <p class="title1">POSTS</p>
    <div class="posts">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="post">
                    <p class="post-title"><?= $post['title'] ?></p>
                    <p><?= $post['text'] ?></p>
                    <div class="post-details">
                        <span>Created by <?= $post['username'] ?></span>
                        <span><?= $post['created_at'] ?></span>
                    </div>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin']['id'] == $post['admin_id']): ?>
                        <a href="edit.php?id=<?= $post['id'] ?>" class="edit-btn">Edit Post</a>
                        <a href="delete.php?id=<?= $post['id'] ?>" class="delete-btn">Delete Post</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else :?>
            <p>You have no posts</p>
        <?php endif; ?>
    </div>
</div>
