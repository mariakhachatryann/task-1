<?php
require_once 'nav.php';
require_once 'models/PostModel.php';
require_once 'models/AdminModel.php';
require_once 'connection.php';


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
            $controller->delete();
            break;
        case 'edit':
            require_once 'controllers/PostController.php';
            $controller = new PostController();
            $controller->edit();
            break;
        case 'login':
            require_once 'controllers/AuthController.php';
            $controller = new AuthController();
            $controller->login();
            break;
        default:
            require_once 'controllers/PostController.php';
            $controller = new PostController();
            $controller->index();
            exit;
    }

}