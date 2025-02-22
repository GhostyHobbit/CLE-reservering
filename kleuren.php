<?php
require_once 'includes/database.php';
/** @var mysqli $db */

session_start();


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

// verkocht eigenschap nog toevoegen bij database en later aanpassen
// Hoeveel is er verkocht en wat is er verkocht
// Op wat moet ik sorteren?
$bestSellerQuery = "SELECT * FROM colours ORDER BY id LIMIT 3";
$bestSellResult = mysqli_query($db, $bestSellerQuery);

while ($row = mysqli_fetch_assoc($bestSellResult)) {
    $bestSellers[] = $row;
}

$coloursQuery = "SELECT * FROM colours";
$coloursResult = mysqli_query($db, $coloursQuery);

while ($row = mysqli_fetch_assoc($coloursResult)) {
    $colours[] = $row;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/kleuren.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap"
          rel="stylesheet">
    <title>Home</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="customerBlogOverview.php">Klant Blog</a>
        <a href="kleuren.php" class="location">Kleuren</a>
        <?php if ($login && $user['isAdmin']) { ?>
            <a href="orders.php">Bestellingen</a>
        <?php } else { ?>
            <a href="bestellen.php">Bestellen</a>
        <?php } ?>
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
    <section id="kleuren-bestseller">
        <h1>Best Verkocht</h1>
        <div id="bestseller">
            <?php foreach ($bestSellers as $bestSeller) { ?>
                <div class="bestseller">
                    <img src="<?= $bestSeller['picture_link'] ?>" alt="">
                    <h2><?= $bestSeller['colour'] ?></h2>
                </div>
            <?php } ?>
        </div>
    </section>
    <section>
        <h1>Seizoen Combinaties</h1>
        <div id="season-colors">
            <img src="images/Placeholder.png " alt="">
            <img src="images/Placeholder.png " alt="">
            <img src="images/Placeholder.png " alt="">
        </div>
    </section>


    <section>
        <h1>Alle Kleuren</h1>
        <div id="all-colors">
        <?php foreach ($colours as $colour) { ?>
            <div class="all-colors">
                <img src="<?= $colour['picture_link'] ?>">
                <h2><?= $colour['colour'] ?></h2>
            </div>
            <?php } ?>
        </div>
    </section>

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