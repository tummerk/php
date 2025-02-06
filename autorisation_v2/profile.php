<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    echo "вы вошли в аккаунт<br>";
    echo $_SESSION['user']['email']." ".$_SESSION['user']['login'];
    ?>
</body>
</html>