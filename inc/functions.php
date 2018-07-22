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
function login_user($email,$password){
    global $db;
    $query=mysqli_query($db,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($query)>0){
        return true;
    }else{
        return false;
    }
}
?>