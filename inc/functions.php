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
function is_login(){
    if(isset($_SESSION['user_email'])){
        return true;
    }else{
        return false;
    }
}
function redirect($url){
    header("Location:" . $url);
}
function is_logout(){
    unset($_SESSION['user_email']);
       
}
function get_userdata(){
    global $db;
    mysqli_set_charset($db,"utf8");
    $email=$_SESSION['user_email'];
    $query = mysqli_query($db,"SELECT * FROM users WHERE email='$email'");
    return mysqli_fetch_array($query);
}
?>