<?php
$message='';
$error='';
if(isset($_POST["register"])){
    mysqli_set_charset($db,"utf8");
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password_conf=md5($_POST["password-conf"]);
    $password=md5($_POST["password"]);
    if($password!=$password_conf){
        $error = 'کلمه عبور و تکرار کلمه عبور با هم برابر نیست.';
    }else{
        if(register_user($name,$email,$password)){
            $message= 'ثبت نام با موفقیت انجام شد. وارد حساب کاربری خود شوید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
    }
}
if(isset($_POST["login"])){
    mysqli_set_charset($db,"utf8");
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    if(login_user($email,$password)){
        $_SESSION['user_email']=$email;
        $message= 'ورود با موفقیت انجام شد. وارد حساب کاربری خود شوید.';
    }else{
        $error='اطلاعات ورودی صحیح نمی‌باشد.';
    }
}
if(isset($_GET["logout"])){
    is_logout();
    redirect('../../');
}
if(isset($_POST["admin-login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    if(admin_login($username,$password)){
        $_SESSION['admin-login']=$username;
        redirect('index.php');
    }else{
        $error='اطلاعات ورودی صحیح نمی‌باشد.';
    }
}
if(isset($_GET["admin-logout"])){
    is_admin_logout();
    redirect('login.php');
}
if(isset($_POST["add-product"])){
    mysqli_set_charset($db,"utf8");
    $name=$_POST["product-name"];
    $price=$_POST["product-price"];
    $cat=$_POST["product-cat"];
    //$image=$_FILES["product-image"]
    $desc=$_POST["product-desc"];
        if(adding_product($name,$price,$cat,$desc)){
            $message= 'محصول اضافه گردید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
    }
    if(isset($_GET["delete-product-id"])){
        $id=$_GET["delete-product-id"];
        if(delete_product($id)){
            $message = 'محصول با موفقیت حذف گردید.';
    }else{
        $error= 'مشکلی به وجود آمده است.';
    }
}
if(isset($_POST["add-cat"])){
    mysqli_set_charset($db,"utf8");
    $name=$_POST["cat-name"];
        if(adding_cat($name)){
            $message= 'محصول اضافه گردید.';
        }else{
            $error= 'مشکلی به وجود آمده است.';
        }
    }
    if(isset($_GET["delete-cat-id"])){
        $id=$_GET["delete-cat-id"];
        if(delete_cat($id)){
            $message = 'دسته بندی با موفقیت حذف گردید.';
    }else{
        $error= 'مشکلی به وجود آمده است.';
    }
}
if(isset($_GET["delete-user-id"])){
    $id=$_GET["delete-user-id"];
    if(delete_user($id)){
        $message = 'کاربر با موفقیت حذف گردید.';
}else{
    $error= 'مشکلی به وجود آمده است.';
}
}
?>