<?php
require_once '../../inc/config.php';
if (!is_login()) {
    redirect('../../');
}
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پروفایل کاربر</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>

<div id="header">
    <div id="top-nav">
        <nav class="container">
            <ul>
                <li><a href="#">صفحه اصلی</a></li>
                <li><a href="#">محصولات آموزشی</a></li>
                <li><a href="#">وبلاگ</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
        </nav>
    </div>
    <div id="logo">
        <h1> سلام  <?php echo get_userdata()['display_name'] ?> </h1>
    </div>
</div>


<div id="main" class="profile">


    <div class="box">a</div>

    <div id="sidebar">
        <div class="sidebar-item">
            <ul>
                <li><a href="#">پروفایل</a></li>
                <li><a href="#">سفارش ها</a></li>
                <li><a href="#">ویرایش</a></li>
                <li><a href="?logout=1">خروج</a></li>
            </ul>
        </div>
    </div>

</div>

<div class="clear"></div>
<?php /*require_once '../sections/footer.php' */?>
</body>
</html>