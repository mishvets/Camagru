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
    <header>
        <nav class="navbar">
            <a href="#" class="active">Home</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#" class="right">Link</a>
        </nav>
        <div class="navbar1">
                <a href="/account/login">LOG IN</a>
                <a href="/account/register">SIGN UP</a>
                <a href="index.php">HOME</a>
                <a href="logout.php">LOGOUT</a>
        </div>
    </header>
    <?php echo $content ?>
  <div id="footer">mshvets &#169 2019</div>
</body>
</html>