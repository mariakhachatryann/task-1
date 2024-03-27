<?php
class PostModel
{
    private $connection;

    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }

    public function getPostById($postId)
    {
        $stmt = $this->connection->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->execute([':id' => $postId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPosts()
    {
        if (isset($_GET['action']) && $_GET['action'] === 'my_posts' && isset($_SESSION['admin'])) {
            $stmt = $this->connection->prepare("SELECT p.*, a.username FROM posts AS p JOIN admins AS a ON p.admin_id = a.id WHERE p.admin_id = :admin_id ORDER BY p.created_at DESC");
            $stmt->execute([':admin_id' => $_SESSION['admin']['id']]);
        } else {
            $stmt = $this->connection->prepare("SELECT p.*, a.username FROM posts AS p JOIN admins AS a ON p.admin_id = a.id ORDER BY p.created_at DESC");
            $stmt->execute();
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPost($title, $text, $adminId)
    {
        $stmt = $this->connection->prepare("INSERT INTO posts (title, text, admin_id) VALUES (:title, :text, :adminId)");
        $stmt->execute([':title' => $title, ':text' => $text, ':adminId' => $adminId]);
    }

    public function deletePost($postId)
    {
        $stmt = $this->connection->prepare("DELETE FROM posts WHERE id = :id AND admin_id = :admin_id");
        $stmt->execute([':id' => $postId, ':admin_id' => $_SESSION['admin']['id']]);
    }

    public function editPost($title, $text, $postId)
    {
        $stmt = $this->connection->prepare("UPDATE posts SET title = :title, text = :text WHERE id = :id");
        $stmt->execute([':title' => $title, ':text' => $text, ':id' => $postId]);
    }
}
