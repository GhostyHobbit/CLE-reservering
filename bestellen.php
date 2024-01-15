<?php
/** @var mysqli $db */
require_once 'includes/database.php';
if (isset($_POST['submit'])) {
    $colourAmount = $_POST['colour_amount'];
    print_r($colourAmount);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <!-- Foto doet raar moet nog aangepast worden -->
    <!--    <img src="images/Logo-reserveringsysteem.png" alt="Logo" class="navbar-logo">-->
    <div class="navbar-middle"> <!-- Nav-Box Middle -->
        <a href="index.php">Home</a>
        <a href="blog.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
        <a href="contact.php">Contact</a>
    </div>
    <a href="login.php">Login</a>
</nav>



<!--begin formulier-->
<form action="bestellenGegevens.php" method="get">
    <label for="colour_amount1">1 Kleur</label>
    <input type="radio" id="colour_amount1" name="colour_amount" value="1" >
    <label for="colour_amount2">2 Kleuren</label>
    <input type="radio" id="colour_amount2" name="colour_amount" value="2">
    <label for="colour_amount3">3 Kleuren</label>
    <input type="radio" id="colour_amount3" name="colour_amount" value="3">
    <br>

    <label for="rope_length">Lengte touw</label>
    <input list="rope_length" name="rope_length">
        <datalist id="rope_length">
            <option  value="50cm"></option>
            <option  value="100cm"></option>
            <option  value="150cm"></option>
            <option  value="200cm"></option>
        </datalist>
    <br>

    <label for="colours">Kleuren</label>
    <textarea id="colours" name="colours"></textarea>
    <br>

    <label for="comments">Opmerkingen</label>
    <textarea id="comments" name="comments"></textarea>
    <br>

    <input list="rope_amount" name="rope_amount">
    <datalist id="rope_amount">
        <option  value="1"></option>
        <option  value="2"></option>
        <option  value="3"></option>
        <option  value="4"></option>
    </datalist>
    <br>

    <input type="submit" id="submit" name="submit" >

</form>

</body>