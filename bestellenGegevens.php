<?php
session_start();
if (!empty($_SESSION)) {
    $login = true;
} else {
    $login = false;
}



//errors werken nog niet
if (isset($_GET['submit2'])) {
    $firstName = $_GET['user_first_name'];
    $infix = $_GET['user_infix'];
    $lastName = $_GET['user_last_name'];
    $cityName = $_GET['city_name'];
    $streetName = $_GET['street_name'];
    $houseNumber = $_GET['house_number'];
    $postalCode = $_GET['postal_code'];

    $colourAmount = $_GET['colour_amount'];
    $ropeLength = $_GET['rope_length'];
    $colours = $_GET['colours'];
    $comments = $_GET['comments'];
    $ropeAmount = $_GET['rope_amount'];

    //zet errors neer als ze er zijn
    if ($firstName === '') {
        $errors['first_name'] = "Verplicht";
        $infixhack = 'wooool';
    }
    if ($lastName === '') {
        $errors['last_name'] = "Verplicht";
    }
    if ($cityName === '') {
        $errors['city_name'] = "Verplicht";
    }
    if ($streetName === '') {
        $errors['street_name'] = "Verplicht";
    }
    if ($houseNumber === '') {
        $errors['house_number'] = "Verplicht";
    }
    if ($postalCode === '') {
        $errors['postal_code'] = "Verplicht";
    }

    $link = "user_first_name=$firstName&colour_amount=$colourAmount&rope_length=$ropeLength&user_infix=$infix&user_last_name=$lastName&city_name=$cityName&street_name=$streetName&house_number=$houseNumber&postal_code=$postalCode&rope_length=$ropeLength&colours=$colours&comments=$comments&rope_amount=$ropeAmount";

    if (empty($errors)) {
        header('location: bestellenOverview.php?'.$link);
    }
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
    <link rel="stylesheet" href="css/register.css">
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
<main>
    <img src="images/wool.png" alt="landschap">
    <!--Registratie formulier-->
    <div class="form">
        <form action="bestellenGegevens.php" method="get">
            <h2 class="title">Bestellen: Gegevens</h2>
            <!--   per input: label met naam, input waar als er iets leeg staat alle volle dingen worden terug gevuld, als er een error is wordt deze naast de input gezet     -->
            <div>
                <div class="stack">
                    <label for="user_first_name">Voornaam</label>
                    <input type="text" id="user_first_name" name="user_first_name" value="<?= $firstName ?? '' ?>">
                    <p><?= $errors['first_name'] ?? '' ?></p>
                </div>
                <div class="stack" id="small">
                    <label for="user_infix">Tussenvoegsel</label>
                    <input type="text" id="user_infix" name="user_infix" value="<?= $infix ?? '' ?>">
                    <p class="infix"><?= $infixhack ?? '' ?></p>
                </div>
            </div>
            <div class="stack">
                <label for="user_last_name">Achternaam</label>
                <input type="text" id="user_last_name" name="user_last_name" value="<?= $lastName ?? '' ?>">
                <p><?= $errors['last_name'] ?? '' ?></p>
            </div>
            <div>
                <div class="stack">
                    <label for="street_name">Adres</label>
                    <input type="text" id="street_name" name="street_name" value="<?= $streetName ?? '' ?>">
                    <p><?= $errors['street_name'] ?? '' ?></p>
                </div>
                <div class="stack" id="small">
                    <label for="house_number">Huisnummer</label>
                    <input type="text" id="house_number" name="house_number" value="<?= $houseNumber ?? '' ?>">
                    <p><?= $errors['house_number'] ?? '' ?></p>
                </div>
            </div>
            <div>
                <div class="stack">
                    <label for="city_name">Plaats</label>
                    <input type="text" id="city_name" name="city_name" value="<?= $cityName ?? '' ?>">
                    <p><?= $errors['city_name'] ?? '' ?></p>
                </div>
                <div class="stack" id="small">
                    <label for="postal_code">Postcode</label>
                    <input type="text" id="postal_code" name="postal_code" value="<?= $postalCode ?? '' ?>">
                    <p><?= $errors['postal_code'] ?? '' ?></p>
                </div>
            </div>
            <button type="submit" name="submit2" class="submit2">Verder</button>

            <input type="hidden" name="rope_length" id="rope_length" value="<?=$_GET['rope_length'] ?>">
            <input type="hidden" name="colour_amount" id="colour_amount" value="<?=$_GET['colour_amount'] ?>">
            <input type="hidden" name="colours" id="colours" value="<?=$_GET['colours'] ?>">
            <input type="hidden" name="comments" id="comments" value="<?=$_GET['comments'] ?>">
            <input type="hidden" name="rope_amount" id="rope_amount" value="<?=$_GET['rope_amount'] ?>">
        </form>
    </div>
    <img src="images/wool.png" alt="landschap">
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
