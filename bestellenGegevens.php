<?php

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
    <form action="bestellenOverview.php?colour_amount=" method="get">
        <label for="user_first_name">Voornaam</label>
        <input type="text" name="user_first_name" id="user_first_name">

        <label for="user_infix">Tussenvoegsel</label>
        <input type="text" name="user_infix" id="user_infix">

        <label for="user_last_name">Achternaam</label>
        <input type="text" name="user_last_name" id="user_last_name">

        <label for="city_name">Stad</label>
        <input type="text" name="city_name" id="city_name">

        <label for="street_name">Straatnaam</label>
        <input type="text" name="street_name" id="street_name">

        <label for="house_number">Huisnummer</label>
        <input type="text" name="house_number" id="house_number">

        <label for="postal_code">Postcode</label>
        <input type="text" name="postal_code" id="postal_code">



        <input type="submit" id="submit" name="submit">

        <input type="hidden" name="rope_length" id="rope_length" value="<?=$_GET['rope_length'] ?>">
        <input type="hidden" name="colour_amount" id="colour_amount" value="<?=$_GET['colour_amount'] ?>">
        <input type="hidden" name="colours" id="colours" value="<?=$_GET['colours'] ?>">
        <input type="hidden" name="comments" id="comments" value="<?=$_GET['comments'] ?>">
        <input type="hidden" name="rope_amount" id="rope_amount" value="<?=$_GET['rope_amount'] ?>">
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
