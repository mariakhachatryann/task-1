<div id="box">
    <form action="index.php?action=login" method="post">
        <p>Admin log in</p>
        <label for="username">
            <input type="text" name="username" placeholder="username">
        </label>
        <label>
            <input type="password" name="password" placeholder="Password" >
        </label>
        <input type="submit" value="Sign up" name="login" >

        <?php if (isset($errors)) :?>
            <?php foreach ($errors as $error):?>
                <div class="error-message"><?= $error ?></div>
            <?php endforeach?>
        <?php endif; ?>
    </form>
</div>