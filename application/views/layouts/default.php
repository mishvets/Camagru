<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
    <link rel="stylesheet" href="/css/style.css">
    <title> <?php echo $title ?></title>
</head>
<body>
    <header>
        <nav class="header">
            <ul>
                <li><a href="/account/login">LOG IN</a></li>
                <li><a href="/account/register">SIGN UP</a></li>
                <li><a href="index.php">HOME</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>
    <?php echo $content ?>
    <div id="footer">mshvets &#169 2019</div>
</body>
</html>