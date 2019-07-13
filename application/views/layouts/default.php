<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
<!--    A viewport meta tag should make the web site work on all devices and screen resolutions:-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <title> <?php echo $title ?></title>
</head>
<body>
    <div class="navbar">
        <a href="#">smth</a>
        <a href="/account/login">LOG IN</a>
        <a href="/account/register">SIGN UP</a>
        <a href="index.php">HOME</a>
    </div>
    <?php echo $content ?>
    <?php echo $content ?>

    <div class="footer">
        <h4>mshvets &#169 2019</h4>
    </div>
</body>
</html>
