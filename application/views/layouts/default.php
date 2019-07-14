<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
<!--    A viewport meta tag should make the web site work on all devices and screen resolutions:-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <title> <?php echo $title ?></title>
<!--    <script-->
<!--            src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">-->
<!--    </script>-->
    <script type="text/javascript" src="/js/jquery.js"></script>
<!--    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
    <script type="text/javascript" src="/js/script.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="#">smth</a>
        <a href="/account/login">LOG IN</a>
        <a href="/account/register">SIGN UP</a>
        <a href="/">HOME</a>
    </div>
    <?php echo $content ?>

    <div class="footer">
        <h4>mshvets &#169 2019</h4>
    </div>
</body>
</html>
