<?php

class PostController
{
    private $model;

    public function __construct()
    {
        $this->model = new PostModel();
    }

    public function index()
    {
        $posts = $this->model->getAllPosts();
        require_once "views/index.php";

        return $posts;
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post'])) {
            $title = $_POST['title'];
            $text = $_POST['text'];

            if (empty($title) || empty($text)) {
                $errors[] = "Fill out all fields!";
            } else {
                $adminId = $_SESSION['admin']['id'];
                $this->model->createPost($title, $text, $_SESSION['admin']['id']);
                header('Location: index.php?action=');
                exit;
            }
        }

        $admin = $_SESSION['admin'];
        require_once "views/create.php";
    }

    public function delete($postId)
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: login.php');
            exit;
        }
        if (isset($_GET['id'])) {
            $postId = $_GET['id'];
            $this->model->deletePost($postId);
            header("Location: index.php?action=");

        } else {
            header('Location: index.php');
            exit;
        }
    }

    public function edit($postId)
    {
        $post = $this->model->getPostById($postId);

        if (!$post || $post['admin_id'] !== $_SESSION['admin']['id']) {
            header('Location: index.php?action=');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
            $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);

            $errors = [];
            if (empty($title) || empty($text)) {
                $errors[] = 'Fill out all fields!';
            } else {
                $this->model->editPost($title, $text, $postId);
                header('Location: index.php?action=');
                exit;
            }
        } else {
            require_once "views/edit.php";
        }
    }

    public function view($postId)
    {
        require_once "views/view.php";
    }

}
