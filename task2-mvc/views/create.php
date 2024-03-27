<?php
require_once '../nav.php';
require_once '../controllers/PostController.php';

$admin = $_SESSION['admin'];
$errors = [];

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];

    if (empty($title) || empty($text)) {
        $errors[] = "Fill out all fields!";
    } else {
        $adminId = $_SESSION['admin']['id'];
        $controller = new PostController();
        $controller->create($title, $text);

        header('Location: index.php');
        exit;
    }
}
?>

<div id="box">
    <p class="welcome">Welcome <?= $admin['username']; ?></p>
    <form action="create.php" method="post">
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
