<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
<!--    A viewport meta tag should make the web site work on all devices and screen resolutions:-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap-responsive.css">
    <link rel="shortcut icon" href="/images/letter-c-32.ico" type="image/x-icon">
    <title> <?php echo $title ?></title>
<!--    <script-->
<!--            src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">-->
<!--    </script>-->
<!--    <script type="text/javascript" src="/js/jquery.js"></script>-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
</head>
<body>
<!--    <nav class="navbar sticky-top navbar-dark bg-dark">-->
    <header>
        <nav class="navbar navbar-fixed-top">

            <a class="brand" id="logo" href="/">
                <img src="/images/logo_200x200.png" width="100">
            </a>
<!--            <div>-->
                <a class="pull-right" href="/photo/creation">smth</a>
                <a class="pull-right" href="/account/login">LOG IN</a>
                <a class="pull-right" href="/account/register">SIGN UP</a>
<!--            </div>-->
        </nav>
<!--        <nav class="navbar navbar-expand navbar-fixed-top">-->
<!--            <ul class="nav nav-pills">-->
<!--                <li>-->
<!--                    <a class="brand" href="/">-->
<!--                        <img src="/images/logo_200x200.png" width="100">-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="pull-right" href="/account/login">LOG IN</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="pull-right" href="/account/register">SIGN UP</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="pull-right" href="/photo/creation">smth</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </nav>-->
    </header>

    <?php echo $content ?>

    <footer class="container">
        <p class="pull-right">&#169 mshvets 2019</p>
    </footer>
</body>
</html>
