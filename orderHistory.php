<?php
session_start();
/** @var mysqli $db */
require_once "includes/database.php";
if (!empty($_SESSION)) {
    $sessionId = $_SESSION['id'];
    $login = true;
    //gets the users data from the database
    $query = "SELECT * FROM users WHERE id = '$sessionId'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    $isAdmin = $user['isAdmin'];
} else {
    $login = false;
    $isAdmin = false;
    $sessionId = 0;
}

$query = "SELECT * FROM orders WHERE user_id = '$sessionId'";
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
    <title>Bestellingen</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="customerBlogOverview.php">Klant Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <?php if ($login) { ?>
            <a href="profile.php">Profiel</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </div>
</nav>
<main>
    <h1>Bestellingen</h1>
    <?php if (isset($orders)) {?>
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
                <td><?= $order['colour1']?><?php if (!empty($order['colour2'])) {?>, <?= $order['colour2']?> <?php } ?><?php if (!empty($order['colour3'])) {?>, <?= $order['colour3']?><?php } ?></td>
                <td><?= $order['rope_length']?> gram</td>
                <td><?= $order['rope_amount']?></td>
                <td><?= $order['comments']?></td>
                <td>
                    <a href="">Verstuurd</a>
                </td>
            </tr>
        <?php } ?>
        <?php } else {?>
            <p>Je hebt nog geen bestellingen.</p>
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
