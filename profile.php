<?php
session_start();

//establishes connection to the database
/** @var mysqli $db */
require_once 'includes/database.php';

if (!empty($_SESSION)) {
    $sessionId = $_SESSION['id'];
    $login = true;
    //gets the users data from the database
    $query = "SELECT * FROM users WHERE id = '$sessionId'";
    $result = mysqli_query($db, $query);
//puts the data in an array
    $user = mysqli_fetch_assoc($result);
} else {
    $login = false;
}
//gets the users data from the database
$query = "SELECT * FROM users WHERE id = '$sessionId'";
$result = mysqli_query($db, $query);
//puts the data in an array
$user = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Instellingen</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="customerBlogOverview.php">Klant Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <?php if ($login && $user['isAdmin']) {?>
            <a href="orders.php">Bestellingen</a>
        <?php }  else {?>
            <a href="bestellen.php">Bestellen</a>
        <?php } ?>
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <a href="logout.php">Log uit</a>
    </div>
</nav>
<header>
    <h1>Settings</h1>
</header>
<main>
    <a href="editSettings.php">Verander persoonlijke gegevens</a>
    <h2><?= $user['first_name']?> <?= $user['infix']?> <?= $user['last_name']?></h2>
    <h3><?= $user['email']?></h3>
    <h3><?= $user['street_name']?> <?= $user['house_number']?></h3>
    <h3><?= $user['postal_code']?></h3>
    <h3><?= $user['city_name']?></h3>
    <?php if (!$user['isAdmin']) { ?>
        <a href="orderHistory.php">Mijn bestellingen</a>
    <?php }  else {?>
        <a href="orders.php">Klant bestellingen</a>
    <?php } ?>
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
