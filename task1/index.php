<?php
require_once 'connection.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['signup']) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $errors = array();

    if (empty($name) || empty($password) || empty($surname)) {
        $errors[] = 'Please fill out all fields';
    } else {
        if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            $errors[] = 'Password must be at least 8 characters long and contain letters and numbers.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            try {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
                $stmt = $connection->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':surname' => $surname,
                    ':email' => $email,
                    ':password' => $hash
                ]);

                $_SESSION['user'] = [$name, $surname, $email];

                header('Location: signed.php');
                exit();
            } catch (PDOException $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }

            $_SESSION['user'] = [$name, $surname, $email];

            header('Location: signed.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #f3f4f6;
        font-family: Arial, sans-serif;
    }

    #box {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    form {
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        padding: 2rem;
        width: 400px;
        border-radius: 0.75rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form p {
        font-weight: bold;
        font-size: 1.875rem;
        margin-bottom: 1rem;
    }

    /* Inputs */
    input[type="text"],
    input[type="number"],
    input[type="password"],
    input[type="email"]{
        width: 100%;
        margin: 0.5rem 0;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        background-color: #f3f4f6;
        outline: none;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus {
        border-color: #3b82f6;
    }

    input[type="submit"] {
        padding: 0.75rem 2.5rem;
        margin-top: 1rem;
        background-color: #3b82f6;
        color: #ffffff;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #2563eb;
    }

    .error-message {
        color: #ef4444;
        font-weight: bold;
        margin-top: 0.75rem;
    }

    a {
        margin-top: 1rem;
        color: #3b82f6;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #2563eb;
    }
</style>
<body>
<div >
    <div id="box">
        <form action="index.php" method="post" >
            <p>Sign up</p>
            <label for="name">
                <input type="text" name="name" placeholder="Name">
            </label>
            <label for="surname">
                <input type="text" name="surname" placeholder="Surname">
            </label>
            <label for="email">
                <input type="email" name="email" placeholder="email">
            </label>
            <label>
                <input type="password" name="password" placeholder="Password" >
            </label>
            <input type="submit" value="Sign up" name="signup" >

            <?php if(isset($errors)) :?>
                <?php foreach ($errors as $error):?>
                    <div><?= $error ?></div>
                <?php endforeach?>
            <?php endif; ?>

        </form>
    </div>

</div>
</body>
</html>

