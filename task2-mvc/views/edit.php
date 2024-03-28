<div id="box">
    <form action="index.php?action=edit&id=<?= $postId ?>" method="post">
        <p>Edit a post</p>
        <label for="title">Title
            <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>"><br>
        </label>
        <label for="text">Text
            <textarea name="text" rows="4" cols="50"><?= htmlspecialchars($post['text']) ?></textarea><br>
        </label>
        <input type="submit" value="Update" name="update">
        <?php if (!empty($errors)) :?>
            <?php foreach ($errors as $error):?>
                <div class="error-message"><?= $error ?></div>
            <?php endforeach?>
        <?php endif; ?>
    </form>
</div>
