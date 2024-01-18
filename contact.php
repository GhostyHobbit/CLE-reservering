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
//puts the data in an array
    $user = mysqli_fetch_assoc($result);
} else {
    $login = false;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Contact Pagina</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <?php if ($login && $user['isAdmin']) {?>
            <a href="orders.php">Bestellingen</a>
        <?php }  else {?>
            <a href="bestellen.php">Bestellen</a>
        <?php } ?>
        <a href="contact.php" class="location">Over Wolhoop</a>
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
    <img src="images/wool.png" alt="wol-collage">
    <div>
        <h1>Over Wolhoop</h1>
        <p>lorum ipsum blabla ur mom</p>
        <h2>Contact</h2>
        <div class="links">
            <a href="https://www.instagram.com/dewolhoopspinning/">Instagram: @dewolhoopspinning</a>
            <a href="https://www.facebook.com/groups/3217490328265360/media" class="facebook">Facebook: De Wolhoop</a>
        </div>





    </div>
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
