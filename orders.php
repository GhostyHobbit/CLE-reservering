<?php
/** @var mysqli $db */
require_once "includes/database.php";


$query = "SELECT * FROM orders WHERE complete = '0'";
$result = mysqli_query($db, $query);


while($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}
mysqli_close($db);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Document</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blog.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="orders.php" class="location">Bestellingen</a>
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <a href="login.php" >Login</a>
    </div>
</nav>
<main>
    <h1>Bestellingen</h1>
    <table class="table is-striped">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Adres</th>
            <th>Plaats</th>
            <th>Hoeveel kleuren</th>
            <th>Welke kleuren</th>
            <th>Hoeveelheid wol</th>
            <th>Aantal bolletjes</th>
            <th>Opmerkingen</th>
            <th>Status</th>
        </tr>
        </thead>
    <?php foreach ($orders as $order) { ?>
        <tr>
            <td><?= $order['user_first_name']?> <?= $order['user_infix']?> <?= $order['user_last_name']?></td>
            <td><?= $order['street_name']?> <?= $order['house_number']?></td>
            <td><?= $order['city_name']?> <?= $order['postal_code']?></td>
            <td><?= $order['colour_amount']?></td>
            <td><?= $order['colour1']?>, <?= $order['colour2']?>, <?= $order['colour3']?></td>
            <td><?= $order['rope_length']?> gram</td>
            <td><?= $order['rope_amount']?></td>
            <td><?= $order['comments']?></td>
            <td>
                <a href="">Verstuurd</a>
            </td>
        </tr>
    <?php } ?>
    </table>
</main>
<footer>
    <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
    <div>
        <img src="images/instagram.png" alt="instagram-logo">
        <a href="https://www.instagram.com/dewolhoopspinning/">@dewolhoopspinning</a>
        <img src="images/facebook.png" alt="facebook-logo">
        <a href="https://www.facebook.com/groups/3217490328265360">De Wolhoop</a>
    </div>
</footer>
</body>
</html>
