<?php
require_once '../nav.php';
require_once '../controllers/PostController.php';
require_once '../models/PostModel.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$postId = $_GET['id'];

$controller = new PostController();
$model = new PostModel();

$post = $model->getPostById($postId);

if (!$post || $post['admin_id'] !== $_SESSION['admin']['id']) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $controller->edit($postId);
    header('Location: index.php');

}
?>

<div id="box">
    <form action="edit.php?id=<?= $postId ?>" method="post">
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
