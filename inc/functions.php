<?php
require_once 'config.php';
function register_user($name,$email,$password){
    global $db;
    mysqli_query($db,"INSERT INTO users (display_name,email,password) VALUES ('$name','$email','$password')");
}
?>