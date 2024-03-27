<?php
class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new AdminModel();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

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
        header("Location: views/login.php");

    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
