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
function adding_product($name,$price,$cat,$image,$tmp,$desc){
    global $db;
    move_uploaded_file($tmp,'../images/' . $image);
    $query=mysqli_query($db,"INSERT INTO products (product_name,product_price,product_cat,product_image,product_desc) VALUES ('$name','$price','$cat','$image','$desc')");
    if($query){
        return true;
    }else{
        return false;
    }
}
function get_products($limit=0){
    global $db;
    mysqli_set_charset($db,"utf8");
    if($limit == 0){
        $query=mysqli_query($db,"SELECT * FROM products ORDER BY id DESC");
    }else{
        $query=mysqli_query($db,"SELECT * FROM products ORDER BY id DESC LIMIT $limit");
    }
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
function get_product_id($id,$is_array = false){
    global $db;
    mysqli_set_charset($db,"utf8");
    $query=mysqli_query($db,"SELECT * FROM products WHERE id='$id'");
    if ($is_array == true) {
        return mysqli_fetch_array($query);
    } else {
        return $query;

    }
}
function get_comments_by_product_id($id){
    global $db;
    mysqli_set_charset($db,"utf8");
    $query=mysqli_query($db,"SELECT * FROM comments WHERE product_id='$id' AND is_approved='1' ORDER BY id DESC ");
    return $query;
}
function add_comment($username,$email,$content,$id){
    global $db;
    $query=mysqli_query($db,"INSERT INTO comments (username,user_email,content,product_id) VALUES ('$username','$email','$content','$id')");
    if($query){
        return true;
    }else{
        return false;
    }
}
function get_comments(){
    global $db;
    mysqli_set_charset($db,"utf8");
    $query=mysqli_query($db,"SELECT * FROM comments WHERE is_approved='0'");
    return $query;
}
function approve_comment($id){
    global $db;
    mysqli_set_charset($db,"utf8");
    $query=mysqli_query($db,"UPDATE comments SET is_approved='1' WHERE id='$id'");
    if($query){
        return true;
    }else{
        return false;
    }}
    function delete_comment($id){
        global $db;
        $query=mysqli_query($db,"DELETE FROM comments WHERE id='$id'");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    function answer_comment($id,$answer){
        global $db;
        mysqli_set_charset($db,"utf8");
        $query=mysqli_query($db,"UPDATE comments SET is_approved='1' , comment_answer='$answer' WHERE id='$id'");
        if($query){
            return true;
        }else{
            return false;
        }}
        function update_product($name,$price,$cat,$desc,$id,$p_image,$tmp=null){
            global $db;
            if(!isset($tmp)){
            $query=mysqli_query($db,"UPDATE products SET product_name='$name' , product_price='$price' , product_cat='$cat' , product_desc='$desc', product_image='$p_image'  WHERE id='$id'");
            }else{
            move_uploaded_file($tmp,'../images/' . $p_image);
            $query=mysqli_query($db,"UPDATE products SET product_name='$name' , product_price='$price' , product_cat='$cat' , product_desc='$desc', product_image='$p_image'  WHERE id='$id'");
            }
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function update_user($name,$address,$num,$email,$image_user2,$tmp_user=null){
            global $db;
            if(!isset($tmp_user)){
            $query=mysqli_query($db,"UPDATE users SET display_name='$name' , user_address='$address' , user_number='$num', user_image='$image_user2'  WHERE email='$email'");
            }else{
            move_uploaded_file($tmp_user,'../../images/profile/' . $image_user2);
            $query=mysqli_query($db,"UPDATE users SET display_name='$name' , user_address='$address' , user_number='$num', user_image='$image_user2'  WHERE email='$email'");
            }
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function add_to_cart($ip,$id){
            global $db;
            $query=mysqli_query($db,"INSERT INTO cart (ip,product_id) VALUES ('$ip','$id')");
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function get_cart_items(){
        global $db;
        $ip=$_SERVER['REMOTE_ADDR'];
        $query=mysqli_query($db,"SELECT * FROM cart WHERE ip='$ip'");
        $product_ids=array();
        while($row=mysqli_fetch_array($query)){
            $product_ids[] = $row['product_id'];
        }
        $products=array();
        foreach ($product_ids as $product_id) {
            $products[] = get_product_id($product_id,true);
        }
        return $products;
    }
        function cart_total(){
        $cart_total=0;
        $cart_items=get_cart_items();
        foreach ($cart_items as $cart_item) {
            $cart_total += $cart_item['product_price'];
        }
        return $cart_total;
    }
    function delete_cart($id){
        global $db;
        $query=mysqli_query($db,"DELETE FROM cart WHERE product_id='$id'");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    function submit_order($email,$product_ids){
        $ids= explode(',',$product_ids,-1);
        global $db;
        $order_id= 'bs-' . time();
        $query=mysqli_query($db,"INSERT INTO orders (order_id,product_id,user_email) VALUES ('$order_id','$product_ids','$email')");
    }
    function get_user_orders(){
        global $db;
        $email = $_SESSION['user_email'];
        mysqli_set_charset($db,"utf8");
        $query=mysqli_query($db,"SELECT * FROM orders WHERE user_email='$email'");
        $orders=array();
        while($row=mysqli_fetch_array($query)){
            $orders[] = $row;
        }
        return $orders;
    }
    function get_order_items($order_id){
        global $db;
        $query=mysqli_query($db,"SELECT * FROM orders WHERE order_id='$order_id'");
        while($row=mysqli_fetch_array($query)){
            $items = explode(',' , $row['product_id'], -1);
        }
        $products= array();
        foreach ($items as $item) {
        $products[]=get_product_id($item,true);
        }
        return $products;
    }
    function get_orders(){
        global $db;
        $query=mysqli_query($db,"SELECT * FROM orders ORDER BY id DESC");
        $orders=array();
        while($row=mysqli_fetch_array($query)){
            $orders[] = $row;
        }
        return $orders;
    }
?>