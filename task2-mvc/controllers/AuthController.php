<?php
require_once '../models/AdminModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new AdminModel();
    }

    public function login($username, $password) {
        $user = $this->userModel->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['admin'] = $user;
            header('Location: index.php');
            exit;
        } else {
            return false;
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
?>
