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
?>