<?php
require_once 'nav.php';

$admin = $_SESSION['admin'];
$errors = [];

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['post']) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($title) || empty($text)) {
        $errors[] = "Fill out all fields!";
    } else {
        try {
            $sql = "INSERT INTO posts (title, text, admin_id) VALUES (:title, :text, :admin_id)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':text' => $text,
                ':admin_id' => $admin['id']
            ]);
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            $errors[] = 'Error: ' . $e->getMessage();
        }
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
        <?php if(isset($errors)) :?>
            <?php foreach ($errors as $error):?>
                <div class="error-message"><?= $error ?></div>
            <?php endforeach?>
        <?php endif; ?>
    </form>
</div>
