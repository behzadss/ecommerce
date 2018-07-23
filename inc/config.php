<?php
$db = mysqli_connect('localhost','behzadss','1757204059','ecommerce');
if(!$db){
echo mysqli_connect_error();
}


error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
define("ADMIN_USERNAME","admin");
define("ADMIN_PASSWORD","13579");

require_once 'functions.php';
require_once 'actions.php';


?>