<?php
session_start();

if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";
//zet post data om naar variabelen
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
//zet errors neer als ze er zijn
    if ($name === '') {
        $errors['name'] = "Je moet nog een naam invullen!";
    }
    if ($email === '') {
        $errors['email'] = "Je moet een email invullen!";
    }
    if ($password === '') {
        $errors['password'] = "Je moet een wachtwoord invullen!";
    }
//check of er niks leeg is
    if ($name !== '' && $email !== '' && $password !== '') {
        //hash het wachtwoord
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //zet alle info in de database
        $query = "INSERT INTO users (email, password, name) VALUES ('$email', '$hashedPassword', '$name')";
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
        <label for="name">Naam</label>
        <input type="text" id="name" name="name" value="<?= $name ?? $errors['name'] ?? '' ?>">
        <?php if(isset($errors['name'])) {
            echo $errors['name'];
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
        <input type="submit" id="submit" name="submit">
    </form>
</body>
</html>
