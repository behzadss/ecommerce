<?php
require_once '../inc/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles/style.css">
    <title>ساخت حساب کاربری جدید</title>
</head>
<body>
    <div id="header">
        <div id='top-nav'>
            <nav class="container">
                <ul>
                <li><a href="#">صفحه اصلی</a></li>
                <li><a href="#">محصولات</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
                </ul>
             </nav>
         </div>
         <div id="logo">
        <h1>ساخت حساب کاربری جدید</h1>
        </div>
    </div>
   <div class="form-box">
   <?php
   if($message){
    ?>
    <div class="message"><?php echo $message ?></div>
   <?php } 
   if($error){?>
       <div class="error"><?php echo $error ?></div>
   <?php } ?>
        <form action="register.php" method="post">
            <p>نام و نام خانوادگی ( به فارسی )</p>
            <input type="text" name="name" id=""><br>
            <p>ایمیل</p>
            <input type="email" name="email" id=""><br>
            <p>کلمه عبور</p>
            <input type="password" name="password" id=""><br>
            <p>تکرار کلمه عبور</p>
            <input type="password" name="password-conf" id=""><br>
            <input type="submit" name="register" value="ساخت حساب کاربری جدید">
        </form>
        <p class="note">قبلا ثبت‌نام کرده‌اید؟ <a href="login.php">وارد شوید.</a></p>
   </div>

<div class="clear"></div>
</body>
</html>