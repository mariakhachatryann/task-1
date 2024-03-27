<?php
require_once '../controllers/AuthController.php';
require_once '../nav.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authController = new AuthController();
    if ($authController->login($username, $password)) {
        exit;
    } else {
        $errors[] = "Incorrect username or password";
    }
}
?>

<div id="box">
    <form action="login.php" method="post">
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