<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <input type="text" name="login" required>
        <input type="password" name="pass" required>
        <input type="submit" required>
    </form>
    <?php
        require_once("config.php");
        $connect=new mysqli($host,$user,$pass,$data);
        $query="SELECT `login`,`pass` FROM `users`";
        $users=$connect->query($query);
        $rows=$users->num_rows;
        $aval=true;
        for ($i=0;$i<$rows;$i++){
            $users->data_seek($i);
            $landp=$users->fetch_array();
            if ($_POST["login"]==$landp['login']){
                echo "ТАКОЙ ЮЗЕР УЖЕ ЕСТЬ";
                $aval=false;
                break;
            }
            
    }if ($aval) {
        // Используем подготовленные выражения для безопасности
        $stmt = $connect->prepare("INSERT INTO `users` (`id_user`, `login`, `pass`) VALUES (NULL, ?, ?)");
        
        // Привязываем параметры
        $stmt->bind_param("ss", $_POST['login'], $_POST['pass']);
        
        // Выполняем запрос
        if ($stmt->execute()) {
            echo "нахлобучили";
        } else {
            echo "Ошибка: " . $stmt->error;
        }
        
        // Закрываем запрос
        $stmt->close();
    }
?>
</body>
</html>