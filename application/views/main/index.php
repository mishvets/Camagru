<h1>Главная страница</h1>

<?php foreach ($login as $val): ?>
    <h3><?php echo $val['login']; ?></h3>
    <p><?php
        if ($val['email']) {
            echo $val['email'];
        }
        else {
            echo "No photo for this user";
        }
    ?></p>
    <hr>
<?php endforeach; ?>