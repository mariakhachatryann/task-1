<?php
session_start();

require_once 'nav.php';
require_once 'models/PostModel.php';
require_once 'models/AdminModel.php';
require_once 'connection.php';
require_once 'controllers/AuthController.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'create':
            require_once 'controllers/PostController.php';
            $controller = new PostController();
            $controller->create();
            break;
        case 'delete':
            require_once 'controllers/PostController.php';
            $controller = new PostController();
            if(isset($_GET['id'])) {
                $postId = $_GET['id'];
                $controller->delete($postId);
            }
            break;
        case 'edit':
            require_once 'controllers/PostController.php';
            $controller = new PostController();
            if(isset($_GET['id'])) {
                $postId = $_GET['id'];
                $controller->edit($postId);
            }
            break;
        case 'login':
            require_once 'controllers/AuthController.php';
            $controller = new AuthController();
            $controller->login();
            break;
        case 'logout':
            require_once 'controllers/AuthController.php';
            $controller = new AuthController();
            $controller->logout();
            break;
        case 'view':
            require_once 'controllers/PostController.php';
            $controller = new PostController();
            if(isset($_GET['id'])) {
                $postId = $_GET['id'];
                $controller->view($postId);
            }
            break;
        case 'loginPage':
            require_once 'controllers/AuthController.php';
            $controller = new AuthController();
            $controller->loginPage();
            break;
        default:
            require_once 'controllers/PostController.php';
            $controller = new PostController();
            $controller->index();
            exit;
    }
}