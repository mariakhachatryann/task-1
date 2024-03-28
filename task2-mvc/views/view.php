<div>
    <div class="post-view">
        <p class="title"><?= $post['title'] ?></p>
        <div class="details">
            <p>Post by id <?= $post['id'] ?></p>
<!--            <span>Created by --><?php //= $post['username'] ?><!--</span>-->
            <p>Created at <?= $post['created_at'] ?></p>
        </div>
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']['id'] == $post['admin_id']): ?>
            <div class="btns">
                <a href="index.php?action=edit&id=<?= $post['id'] ?>" class="edit-btn">Edit Post</a>
                <a href="index.php?action=delete&id=<?= $post['id'] ?>" class="delete-btn">Delete Post</a>
            </div>
        <?php endif; ?>
        <p class="text">
            <?= $post['text'] ?>
        </p>
    </div>
</div>