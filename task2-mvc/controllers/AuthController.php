<?php
class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new AdminModel();
    }

    public function loginPage()
    {
        require 'views/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['admin'] = $user;
                header('Location: index.php?action=');
            } else {
                $errors[] = 'Invalid username or password';
                exit;
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        session_write_close();
        header('Location: index.php?action=');
        exit;
    }
}
