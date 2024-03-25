<?php
session_start();
$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div >
    <div id="box" class="w-full h-screen flex justify-center items-center flex-col">
        <p>Welcome, <?php echo $user[0] . " " . $user[1]; ?>! </p>
        <a href="logout.php">Logout</a>
</div>
</body>
</html>