<?php
$_GET['comments'];
//
$test = $_GET['rope_amount'];
$get = $_GET;
print_r($get)
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
    <title>Bestellen - Gegevens</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <a href="login.php" >Login</a>
    </div>
</nav>
<main>
    <?= $test?>
    <form action="bestellenOverview.php?colour_amount=" method="get">
        <input type="text" name="test" id="test">
        <input type="submit" id="submit" name="submit">
    </form>
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
