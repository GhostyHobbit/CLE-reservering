<?php
session_start();
/** @var mysqli $db */
require_once 'includes/database.php';
if (isset($_POST['submit'])) {
    $colourAmount = $_POST['colour_amount'];
}

if (!empty($_SESSION)) {
    $login = true;
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
    <link rel="stylesheet" href="css/bestellen.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Bestellen</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php" class="location">Bestellen</a>
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

<!--begin formulier-->
<main>
    <h1>Bestellen: Kies uw kleuren</h1>
    <!--begin formulier-->
    <form <?php if ($login) { ?>
        action = "bestellenOverview.php"
    <?php } else {?>
        action = "bestellenGegevens.php"
    <?php }?> method="get">

    <div class="rowFlex">
            <div>
                <div class="img">
                    <img src="images/1kleur.jpg" alt="één-kleur">
                </div>
                <label for="colour_amount1">1 Kleur</label>
                <input type="radio" id="colour_amount1" name="colour_amount" value="1" >
                <span class="checkmark"></span>
            </div>
            <div>
                <div class="img">
                    <img src="images/2kleur.jpg" alt="twee-kleuren">
                </div>
                <label for="colour_amount2">2 Kleuren</label>
                <input type="radio" id="colour_amount2" name="colour_amount" value="2">
                <span class="checkmark"></span>
            </div>
            <div>
                <div class="img">
                    <img src="images/3kleur.jpg" alt="drie-kleuren">
                </div>
                <label for="colour_amount3">3 Kleuren</label>
                <input type="radio" id="colour_amount3" name="colour_amount" value="3">
                <span class="checkmark"></span>
            </div>
        </div>

        <div class="fields">
            <div class="stack">
                <label for="rope_length">Lengte Wol</label>
                <input list="rope_length" name="rope_length">
                    <datalist id="rope_length">
                        <option  value="50cm"></option>
                        <option  value="100cm"></option>
                        <option  value="150cm"></option>
                        <option  value="200cm"></option>
                    </datalist>
            </div>
            <div class="stack">
                <label for="colours">Kleuren</label>
                <textarea id="colours" name="colours"></textarea>
            </div>
            <div class="stack">
                <label for="comments">Opmerkingen</label>
                <textarea id="comments" name="comments"></textarea>
            </div>
            <div class="stack">
                <label for="rope_amount">Hoeveel bolletjes?</label>
                <input list="rope_amount" name="rope_amount">
                <datalist id="rope_amount">
                    <option  value="1"></option>
                    <option  value="2"></option>
                    <option  value="3"></option>
                    <option  value="4"></option>
                </datalist>
            </div>


            <input type="submit" id="submit" name="submit" class="submit">
        </div>
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