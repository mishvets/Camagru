<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
<!--    A viewport meta tag should make the web site work on all devices and screen resolutions:-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
<!--    <nav class="navbar sticky-top navbar-dark bg-dark">-->
    <nav class="navbar">
        <a href="#">smth</a>
        <a href="/account/login">LOG IN</a>
        <a href="/account/register">SIGN UP</a>
        <a href="/">HOME</a>
    </nav>
    <?php echo $content ?>

    <div class="footer">
        <h6>mshvets &#169 2019</h6>
    </div>
</body>
</html>
