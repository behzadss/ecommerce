<?php require_once '../inc/config.php';
/*if (is_login()) {
    redirect('profile');
}
require_once '../sections/header.php';*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>ورود به حساب کاربری</title>
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
        <h1>ورود به حساب کاربری</h1>
        </div>
    </div>
<div class="forms-box">
    <?php
    if ($message) {
        ?>
        <div class="message"><?php echo $message ?></div>
        <?php
    }
    if ($error) {
        ?>
        <div class="error"><?php echo $error ?></div>
        <?php
    }
    ?>
    <form action="login.php" method="post">
        <p>ایمیل</p>
        <input type="email" name="email" autocomplete="off" autofocus required><br>
        <p>کلمه عبور</p>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="ورود به حساب کاربری">
    </form>
    <p class="note">حساب کاربری ندارید؟ <a href="register.php">یکی بسازید :)</a></p>
    <p class="note"><a href="#">کلمه عبورم را فراموش کرده‌ام :(</a></p>
</div>

<div class="clear"></div>
<?php /*require_once '../sections/footer.php' */?>
</body>
</html>