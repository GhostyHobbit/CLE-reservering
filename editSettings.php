<?php
session_start();

//establishes connection to the database
/** @var mysqli $db */
require_once 'includes/database.php';

if(empty($_SESSION)) {
    header('Location: login.php');
    exit();
}

$sessionId = $_SESSION['id'];

if(isset($_POST['submit'])) {

    $firstName = mysqli_escape_string($db,$_POST['firstName']);
    $infix = mysqli_escape_string($db,$_POST['infix']);
    $lastName = mysqli_escape_string($db,$_POST['lastName']);
    $email = mysqli_escape_string($db,$_POST['email']);
    $streetName = mysqli_escape_string($db,$_POST['streetName']);
    $houseNumber = mysqli_escape_string($db,$_POST['houseNumber']);
    $postalCode = mysqli_escape_string($db,$_POST['postalCode']);
    $cityName = mysqli_escape_string($db,$_POST['cityName']);

    if ($firstName === '') {
        $errors['first_name'] = "Je moet nog een voornaam invullen!";
    }
    if ($lastName === '') {
        $errors['last_name'] = "Je moet nog een achternaam invullen!";
    }
    if ($email === '') {
        $errors['email'] = "Je moet een email invullen!";
    }
    if ($cityName === '') {
        $errors['city_name'] = "Je moet nog een stad invullen!";
    }
    if ($streetName === '') {
        $errors['street_name'] = "Je moet nog een straatnaam invullen!";
    }
    if ($houseNumber === '') {
        $errors['house_number'] = "Je moet nog een huisnummer invullen!";
    }
    if ($postalCode === '') {
        $errors['postal_code'] = "Je moet nog een postcode invullen!";
    }

    $query = "UPDATE users 
                    SET first_name = '$firstName', 
                        infix = '$infix', 
                        last_name = '$lastName', 
                        email = '$email', 
                        street_name = $streetName, 
                        house_number = '$houseNumber',
                        postal_code = '$postalCode', 
                        city_name = '$cityName' 
             WHERE id = '$sessionId'";

    $result = mysqli_query($db, $query)
    or die('Error '.mysqli_error($db).' with query '.$query);

    header('Location: profile.php');
    exit;
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Gegevens aanpassen</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <a href="logout.php" >Log uit</a>
    </div>
</nav>

<header>

</header>
<main>
    <?= $sessionId ?>
    <form method="post">
        <div>
            <label for="firstName">Voornaam</label>
            <input type="text" name="firstName" id="firstName">
            <?php if(isset($errors['first_name'])) {
                echo $errors['first_name'];
            } ?>
        </div>
        <div>
            <label for="infix">Tussenvoegsel</label>
            <input type="text" name="infix" id="infix">
        </div>
        <div>
            <label for="lastName">Achternaam</label>
            <input type="text" name="lastName" id="lastName">
            <?php if(isset($errors['last_name'])) {
                echo $errors['last_name'];
            } ?>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <?php if(isset($errors['email'])) {
                echo $errors['email'];
            } ?>
        </div>
        <div>
            <label for="streetName">Straatnaam</label>
            <input type="text" name="streetName" id="streetName">
            <?php if(isset($errors['street_name'])) {
                echo $errors['street_name'];
            } ?>
        </div>
        <div>
            <label for="houseNumber">Huisnummer</label>
            <input type="text" name="houseNumber" id="houseNumber">
            <?php if(isset($errors['house_number'])) {
                echo $errors['house_number'];
            } ?>
        </div>
        <div>
            <label for="postcode">Postcode</label>
            <input type="text" name="postcode" id="postcode">
            <?php if(isset($errors['postal_code'])) {
                echo $errors['postal_code'];
            } ?>
        </div>
        <div>
            <label for="city">Plaats</label>
            <input type="text" name="city" id="city">
            <?php if(isset($errors['city_name'])) {
                echo $errors['city_name'];
            } ?>
        </div>
        <div>
            <button type="submit" class="button">Plaats Veranderingen</button>
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
</html>
