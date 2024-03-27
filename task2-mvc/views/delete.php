<?php
require_once '../nav.php';
require_once '../controllers/PostController.php';

$admin = $_SESSION['admin'];

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $controller = new PostController();
    $controller->delete($postId);
}

header('Location: index.php');
exit;