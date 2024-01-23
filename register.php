<?php
session_start();

if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";
//zet post data om naar variabelen
    $firstName = $_POST['first_name'];
    $infix = $_POST['infix'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cityName = $_POST['city_name'];
    $streetName = $_POST['street_name'];
    $houseNumber = $_POST['house_number'];
    $postalCode = $_POST['postal_code'];
    $invalid = '';
    $infixhack = '';

//zet errors neer als ze er zijn
    if ($firstName === '') {
        $errors['first_name'] = "Verplicht";
        $invalid = 'Verplicht';
        $infixhack = 'wooo';
    }
    if ($lastName === '') {
        $errors['last_name'] = "Verplicht";
        $invalid = 'Verplicht';
    }
    if ($email === '') {
        $errors['email'] = "Verplicht";
    }
    if ($password === '') {
        $errors['password'] = "Verplicht";
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
//check of er niks leeg is
    if ($firstName !== '' && $lastName !== '' && $email !== '' && $password !== '' && $cityName !== '' && $streetName !== '' && $houseNumber !== '' && $postalCode !== '') {
        //hash het wachtwoord
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //zet alle info in de database
        $query = "INSERT INTO users (email, password, first_name, infix, last_name, city_name, street_name, house_number, postal_code) VALUES ('$email', '$hashedPassword', '$firstName', '$infix', '$lastName', '$cityName', '$streetName', '$houseNumber', '$postalCode')";
        mysqli_query($db, $query);
        //ga naar de login pagina
        header('Location: login.php');
        exit();
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
    <title>Register</title>
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
</nav>
<main>
<img src="images/shep.jpg" alt="banner">
<!--Registratie formulier-->
<div class="form">
    <form method="post" action="">
        <h2 class="title">Registreren</h2>
<!--   per input: label met naam, input waar als er iets leeg staat alle volle dingen worden terug gevuld, als er een error is wordt deze naast de input gezet     -->
        <div>
            <div class="stack">
                <label for="first_name">Voornaam</label>
                <input type="text" id="first_name" name="first_name" value="<?= $firstName ?? '' ?>">
                <p><?= $errors['first_name'] ?? '' ?></p>
            </div>
            <div class="stack" id="small">
                <label for="infix">Tussenvoegsel</label>
                <input type="text" id="infix" name="infix" value="<?= $infix ?? '' ?>">
                <p class="infix"><?= $infixhack ?? '' ?></p>
            </div>
        </div>
        <div class="stack">
            <label for="last_name">Achternaam</label>
            <input type="text" id="last_name" name="last_name" value="<?= $lastName ?? '' ?>">
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
        <div class="stack">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $email ?? '' ?>">
            <p><?= $errors['email'] ?? '' ?></p>
        </div>
        <div class="stack">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" value="">
            <p><?= $errors['password'] ?? '' ?></p>
        </div>

        <button type="submit" name="submit" class="submit">Registreren</button>
    </form>
    <a href="login.php">Heb je al een profiel? Log in</a>
</div>
<img src="images/alpx.jpg" alt="banner">
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
