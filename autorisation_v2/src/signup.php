<?php
require_once "../db.php";
$db=new db("localhost","registration","root","mysql");
session_start();
$email=$_POST["email"];
$login=$_POST["login"];
$password=$_POST["password"];
$reap_password=$_POST["reap_password"];

if ($db->isExist($login)){
    $_SESSION["message"]="логин уже занят";
    header("Location: ../register.php");
}
elseif ($reap_password==$password){
    $db->new_user($login,$password,$email);
    $_SESSION["reg"]='регистрация завершена успешно';
    header("Location: ../index.php");
}else{
    $_SESSION["message"]="пароли не совпадают";
    header("Location: ../register.php");
}
?>