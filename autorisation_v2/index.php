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
<form action="src/signin.php" method="post">
    <label>логин</label>
    <input type="text" name="login" required>
    <label>пароль</label>
    <input type="password" name="password" required>
    <button>ВОЙТИ</button>
    <p>
    у вас нет аккаунта <a href="register.php">зарегаться</a>
    </p>
    <?php
    if (array_key_exists('reg', $_SESSION)){
        echo "<p class='msg'>".$_SESSION['reg']."</p>";
    }unset($_SESSION['reg']);
    ?>

</form>

</body>
</html>