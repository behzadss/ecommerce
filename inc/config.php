<?php
$db = mysqli_connect('localhost','behzadss','1757204059','ecommerce');
if(!$db){
echo mysqli_connect_error();
}else{
echo 'وصل';
}


?>