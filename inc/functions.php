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
function admin_login($username,$password){
    if($username==ADMIN_USERNAME && $password==ADMIN_PASSWORD){
        return true;
    }else{
        return false;
    }
}
function is_admin_login(){
    if(isset($_SESSION['admin-login'])){
        return true;
    }else{
        return false;
    }
}
function is_admin_logout(){
    unset($_SESSION['admin-login']);
       
}
function adding_product($name,$price,$cat,$desc){
    global $db;
    $query=mysqli_query($db,"INSERT INTO products (product_name,product_price,product_cat,product_desc) VALUES ('$name','$price','$cat','$desc')");
    if($query){
        return true;
    }else{
        return false;
    }
}
function get_products(){
    global $db;
    mysqli_set_charset($db,"utf8");
    $query=mysqli_query($db,"SELECT * FROM products ORDER BY id DESC");
    return $query;
}
function delete_product($id){
    global $db;
    $query=mysqli_query($db,"DELETE FROM products WHERE id='$id'");
    if($query){
        return true;
    }else{
        return false;
    }
}
function adding_cat($name){
    global $db;
    $query=mysqli_query($db,"INSERT INTO category (cat_name) VALUES ('$name')");
    if($query){
        return true;
    }else{
        return false;
    }
}
function get_cats(){
    global $db;
    mysqli_set_charset($db,"utf8");
    $query=mysqli_query($db,"SELECT * FROM category ORDER BY id DESC");
    return $query;
}
function delete_cat($id){
    global $db;
    $query=mysqli_query($db,"DELETE FROM category WHERE id='$id'");
    if($query){
        return true;
    }else{
        return false;
    }
}
function get_users(){
    global $db;
    mysqli_set_charset($db,"utf8");
    $query=mysqli_query($db,"SELECT * FROM users ORDER BY id DESC");
    return $query;
}
function delete_user($id){
    global $db;
    $query=mysqli_query($db,"DELETE FROM users WHERE id='$id'");
    if($query){
        return true;
    }else{
        return false;
    }
}
?>