<?php
require_once 'config.php';
function register_user($name,$email,$password){
    global $db;
    $query=mysqli_query($db,"INSERT INTO users (display_name,email,password) VALUES ('$name','$email','$password')");
    if($query){
        return true;
    }else{
        return false;
    }
}
function login_user($name,$email,$password){
    global $db;
    $query=mysqli_query($db,"SELECT * FROM users WHERE ");
    if($query){
        return true;
    }else{
        return false;
    }
}
?>