<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    try {
        $stmt = $connection->prepare("DELETE FROM posts WHERE id = :id AND admin_id = :admin_id");
        $stmt->execute([':id' => $postId, ':admin_id' => $_SESSION['admin']['id']]);

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
