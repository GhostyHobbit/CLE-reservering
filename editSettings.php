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

    $isAdmin = $user['isAdmin'];
} else {
    $login = false;
    $isAdmin = false;
}

//establishes connection to the database
/** @var mysqli $db */
require_once 'includes/database.php';

if(empty($_SESSION)) {
    header('Location: login.php');
    exit();
}
$sessionId = $_SESSION['id'];
if(!isset($_POST['submit'])) {
//gets the users data from the database
    $query = "SELECT * FROM users WHERE id = '$sessionId'";
    $result = mysqli_query($db, $query);
//puts the data in an array
    $user = mysqli_fetch_assoc($result);
}
if(isset($_POST['submit'])) {

    $firstName = $_POST['first_name'];
    $infix = $_POST['infix'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $streetName = $_POST['street_name'];
    $houseNumber = $_POST['house_number'];
    $postalCode = $_POST['postal_code'];
    $cityName = $_POST['city_name'];

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
                        street_name = '$streetName', 
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
        <form method="post" action="">
            <h2 class="title">Verander informatie</h2>
            <!--   per input: label met naam, input waar als er iets leeg staat alle volle dingen worden terug gevuld, als er een error is wordt deze naast de input gezet     -->
            <div>
                <div class="stack">
                    <label for="first_name">Voornaam</label>
                    <input type="text" id="first_name" name="first_name" <?php if (isset($user)) { ?> value="<?= $user['first_name'] ?>" <?php } ?>>
                    <p><?php if(isset($errors['first_name'])) { echo $errors['first_name']; } ?></p>
                </div>
                <div class="stack" id="small">
                    <label for="infix">Tussenvoegsel</label>
                    <input type="text" id="infix" name="infix" <?php if (isset($user)) { ?> value="<?= $user['infix'] ?>" <?php } ?>>
                    <p><?php if(isset($errors['infix'])) { echo $errors['infix']; } ?></p>
                </div>
            </div>
            <div class="stack">
                <label for="last_name">Achternaam</label>
                <input type="text" id="last_name" name="last_name" <?php if (isset($user)) { ?> value="<?= $user['last_name'] ?>" <?php } ?>>
                <p><?php if(isset($errors['last_name'])) { echo $errors['last_name']; } ?></p>
            </div>
            <div>
                <div class="stack">
                    <label for="street_name">Adres</label>
                    <input type="text" id="street_name" name="street_name" <?php if (isset($user)) { ?> value="<?= $user['street_name'] ?>" <?php } ?>>
                    <p><?php if(isset($errors['street_name'])) { echo $errors['street_name']; } ?></p>
                </div>
                <div class="stack" id="small">
                    <label for="house_number">Huisnummer</label>
                    <input type="text" id="house_number" name="house_number" <?php if (isset($user)) { ?> value="<?= $user['house_number'] ?>" <?php } ?>>
                    <p><?php if(isset($errors['house_number'])) { echo $errors['house_number']; } ?></p>
                </div>
            </div>
            <div>
                <div class="stack">
                    <label for="city_name">Plaats</label>
                    <input type="text" id="city_name" name="city_name" <?php if (isset($user)) { ?> value="<?= $user['city_name'] ?>" <?php } ?>>
                    <p><?php if(isset($errors['city_name'])) { echo $errors['city_name']; } ?></p>
                </div>
                <div class="stack" id="small">
                    <label for="postal_code">Postcode</label>
                    <input type="text" name="postal_code" id="postal_code" <?php if (isset($user)) { ?> value="<?= $user['postal_code'] ?>" <?php } ?>>
                    <p><?php if(isset($errors['postal_code'])) { echo $errors['postal_code']; } ?></p>
                </div>
            </div>
            <div class="stack">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" <?php if (isset($user)) { ?> value="<?= $user['email'] ?>" <?php } ?>>
                <p><?php if(isset($errors['email'])) { echo $errors['email']; } ?></p>
            </div>

            <button type="submit" name="submit" class="submit">Verstuur</button>
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
