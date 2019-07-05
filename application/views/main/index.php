<h1>Главная страница</h1>

<?php foreach ($photos as $val): ?>
    <h3><?php echo $val['name']; ?></h3>
    <p><?php
        if ($val['photos']) {
            echo $val['photos'];
        }
        else {
            echo "No photo for this user";
        }
    ?></p>
    <hr>
<?php endforeach; ?>