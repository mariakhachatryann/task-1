<?php
require_once 'nav.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['login']) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username) || empty($password)) {
        $errors[] = 'Please fill out all fields';
    } else {
        $stmt = $connection->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $row;
            header('Location: create.php');
            exit();
        } else {
            $errors[] = 'incorrect username or password';
        }
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

        <?php if(isset($errors)) :?>
            <?php foreach ($errors as $error):?>
                <div class="error-message"><?= $error ?></div>
            <?php endforeach?>
        <?php endif; ?>
    </form>
</div>