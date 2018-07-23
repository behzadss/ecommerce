<?php require_once 'inc/config.php';
$products = get_products(6);
//require_once 'sections/header.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>فروشگاه اینترنتی</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div id="header">
    <div id="top-nav">
        <nav class="container">
            <ul>
                <li><a href="<?php echo PATH; ?>">صفحه اصلی</a></li>
                <li><a href="<?php echo PATH; ?>index.php#products">محصولات آموزشی</a></li>
                <li><a href="<?php echo PATH; ?>about.php">درباره ما</a></li>
                <li><a href="<?php echo PATH; ?>contact.php">تماس با ما</a></li>
            </ul>
        </nav>
    </div>
    <div id="logo">
        <h1>فروشگاه اینترنتی</h1>
    </div>
</div>
<div id="main">
    <div id="content">
        <div id="products">

            <?php while ($product = mysqli_fetch_array($products)) { ?>
                <div class="product-item">
                    <div class="product-image"><a href="product.php?product-id=<?php echo $product['id'] ?>"><img src="images/<?php echo $product['product_image'] ?>" alt=""></a></div>
                    <div class="product-title"><a href="product.php?product-id=<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></a></div>
                    <div class="product-price"><?php echo $product['product_price'] ?> تومان</div>
                    <div class="read-more"><a href="product.php?product-id=<?php echo $product['id'] ?>">جزئیات محصول</a></div>
                </div>
            <?php } ?>

        </div>
    </div>
    <?php //require_once 'sections/sidebar.php' ?>
</div>
<div class="clear"></div>
<?php //require_once 'sections/footer.php' ?>
</body>
</html>