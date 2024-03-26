<?php
require_once 'nav.php';

$errors = [];
$admin = $_SESSION['admin'];

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$postId = $_GET['id'];

$stmt = $connection->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute([':id' => $postId]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post || $post['admin_id'] !== $admin['id']) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($title) || empty($text)) {
        $errors[] = "Fill out all fields!";
    } else {
        $stmt = $connection->prepare("UPDATE posts SET title = :title, text = :text WHERE id = :id");
        $stmt->execute([':title' => $title, ':text' => $text, ':id' => $postId]);
        header('Location: index.php');
        exit;
    }
}
?>

<div id="box">
    <p class="welcome">Welcome <?= $admin['username']; ?></p>
    <form action="edit.php?id=<?= $postId ?>" method="post">
        <p>Edit a post</p>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>"><br>
        <label for="text">Text</label>
        <textarea name="text" rows="4" cols="50"><?= htmlspecialchars($post['text']) ?></textarea><br>
        <input type="submit" value="Update" name="update">
        <?php if(!empty($errors)) :?>
            <?php foreach ($errors as $error):?>
                <div class="error-message"><?= $error ?></div>
            <?php endforeach?>
        <?php endif; ?>
    </form>
</div>
