<?php
session_start();
require_once "../db.php";
$db=new db("localhost","registration","root","mysql");
if ($db->isCorrect($_POST["login"],$_POST["password"])){
    $_SESSION['user']=$db->user($_POST["login"]);
    header("Location: ../profile.php");
}else{
    $_SESSION["reg"]="неправильный логин или пароль";
    header("Location: ../index.php");
}

