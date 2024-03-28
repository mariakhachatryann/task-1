<div id="box">
    <p class="welcome">Welcome <?= $admin['username']; ?></p>
    <form action="index.php?action=create" method="post">
        <p>Create post</p>
        <label for="text">Title
            <input type="text" name="title">
        </label>
        <label for="text">Text
            <textarea name="text" rows="1" cols="30"></textarea>
        </label>
        <input type="submit" value="Post" name="post" >
        <?php if (isset($errors)) :?>
            <?php foreach ($errors as $error):?>
                <div class="error-message"><?= $error ?></div>
            <?php endforeach?>
        <?php endif; ?>
    </form>
</div>
