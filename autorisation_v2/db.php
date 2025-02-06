<?php
class db{
    private $host;
    private $data;
    private $user;
    private $pass;
    public function __construct($host,$data,$user,$pass){
        $this->host=$host;
        $this->data=$data;
        $this->user=$user;
        $this->pass=$pass;

    }
    public function conn(){
        return new mysqli($this->host,$this->user,$this->pass,$this->data);
    }
    public function select($value,$table){
        $users=$this->conn()->query("SELECT `$value` FROM `$table`");
        return $users;
    }
    public function isCorrect($login,$pass){
        $users=$this->conn()->query("SELECT * FROM `users` WHERE `login`='$login' and `password`='$pass'");
        if ($users->num_rows>0){
            return true;
        }return false;
    }
    public function isExist($login){
        $users=$this->conn()->query("SELECT * FROM `users` WHERE `login`='$login'");
        if ($users->num_rows>0){
            return true;
        }return false;
    }
    public function new_user($login,$password,$email){
        $users=$this->conn()->query("INSERT INTO `users` (`id_user`, `login`, `password`, `email`) VALUES (NULL, '$login', '$password', '$email');");
        $this->conn()->close();
    }
    public function user($login){
        $users=$this->conn()->query("SELECT * FROM `users` WHERE `login`='$login'");
        $this->conn()->close();
        $user=mysqli_fetch_assoc($users);
        return $user;
    }

}
?>