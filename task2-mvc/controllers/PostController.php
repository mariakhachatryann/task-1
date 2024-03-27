<?php
require_once '../models/PostModel.php';

class PostController {
    private $model;

    public function __construct() {
        $this->model = new PostModel();
    }

    public function index() {
        $posts = $this->model->getAllPosts();
        return $posts;
    }

    public function create($title, $text) {
        $this->model->createPost($title, $text, $_SESSION['admin']['id']);
        header('Location: index.php');
        exit;
    }

    public function delete($postId) {
        if (!isset($_SESSION['admin'])) {
            header('Location: login.php');
            exit;
        }
        if (isset($_GET['id'])) {
            $postId = $_GET['id'];
            $this->model->deletePost($postId);

        } else {
            header('Location: index.php');
            exit;
        }
    }

    public function edit($postId) {
        $errors = [];
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($title) || empty($text)) {
            $errors[] = 'Fill out all fields!';
        } else {
            $this->model->editPost($title, $text, $postId);
        }

        return $errors;
    }
}

