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

//zet errors neer als ze er zijn
    if ($firstName === '') {
        $errors['first_name'] = "Je moet nog een voornaam invullen!";
    }
    if ($lastName === '') {
        $errors['last_name'] = "Je moet nog een achternaam invullen!";
    }
    if ($email === '') {
        $errors['email'] = "Je moet een email invullen!";
    }
    if ($password === '') {
        $errors['password'] = "Je moet een wachtwoord invullen!";
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
//check of er niks leeg is
    if ($firstName !== '' && $lastName !== '' && $email !== '' && $password !== '' && $cityName !== '' && $streetName !== '' && $houseNumber !== '' && $postalCode !== '') {
        //hash het wachtwoord
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //zet alle info in de database
        $query = "INSERT INTO users (email, password, first_name, infix, last_name, city_name, street_name, house_number, postal_code) VALUES ('$email', '$hashedPassword', '$firstName', '$infix', '$lastName', '$cityName', '$streetName', '$houseNumber', '$postalCode')";
        mysqli_query($db, $query);
        //ga naar de login pagina
        header(header: 'Location: login.php');
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
    <title>Document</title>
</head>
<body>
<!--Registratie formulier-->
    <form method="post" action="">
        <label for="first_name">Voornaam</label>
        <input type="text" id="first_name" name="first_name" value="<?= $firstName ?? $errors['first_name'] ?? '' ?>">
        <?php if(isset($errors['first_name'])) {
            echo $errors['first_name'];
        } ?>
        <br>

        <label for="infix">Tussenvoegsel</label>
        <input type="text" id="infix" name="infix" value="<?= $infix ?? $errors['infix'] ?? '' ?>">
        <?php if(isset($errors['infix'])) {
            echo $errors['infix'];
        } ?>
        <br>

        <label for="last_name">Achternaam</label>
        <input type="text" id="last_name" name="last_name" value="<?= $lastName ?? $errors['last_name'] ?? '' ?>">
        <?php if(isset($errors['last_name'])) {
            echo $errors['last_name'];
        } ?>
        <br>

        <label for="text">Email</label>
        <input type="email" id="email" name="email" value="<?= $email ?? $errors['email'] ?? '' ?>">
        <?php if(isset($errors['email'])) {
            echo $errors['email'];
        } ?>
        <br>

        <label for="password">Wachtwoord</label>
        <input type="password" id="password" name="password" value="">
        <?php if(isset($errors['password'])) {
            echo $errors['password'];
        } ?>
        <br>

        <label for="city_name">Stad</label>
        <input type="text" id="city_name" name="city_name" value="<?= $cityName ?? $errors['city_name'] ?? '' ?>">
        <?php if(isset($errors['city_name'])) {
            echo $errors['city_name'];
        } ?>
        <br>

        <label for="street_name">Straat</label>
        <input type="text" id="street_name" name="street_name" value="<?= $streetName ?? $errors['street_name'] ?? '' ?>">
        <?php if(isset($errors['street_name'])) {
            echo $errors['street_name'];
        } ?>
        <br>

        <label for="house_number">Huisnummer</label>
        <input type="text" id="house_number" name="house_number" value="<?= $houseNumber ?? $errors['house_number'] ?? '' ?>">
        <?php if(isset($errors['house_number'])) {
            echo $errors['house_number'];
        } ?>
        <br>

        <label for="postal_code">Postcode</label>
        <input type="text" id="postal_code" name="postal_code" value="<?= $postalCode ?? $errors['postal_code'] ?? '' ?>">
        <?php if(isset($errors['postal_code'])) {
            echo $errors['postal_code'];
        } ?>
        <br>
        <br>
        <input type="submit" id="submit" name="submit">
    </form>
</body>
</html>
