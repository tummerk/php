<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>авторизация </title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<!--форма авторизации-->
<form action="src/signup.php" method="post">
    <label>почта</label>
    <input type="email" name="email" required>
    <label>логин</label>
    <input type="text" name="login" required>
    <label>пароль</label>
    <input type="password" name="password" required>
    <label>пароль</label>
    <input type="password" name="reap_password" required>
    <button>ВОЙТИ</button>
    <p>
        у вас есть аккаунт <a href="/">авторизируйтесь</a>
    </p>

        <?php
        if (array_key_exists('message', $_SESSION)){
            echo "<p class='msg'>".$_SESSION['message']."</p>";
        }unset($_SESSION['message']);
        ?>

</form>

</body>
</html>