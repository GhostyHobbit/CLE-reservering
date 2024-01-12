<?php
session_start();

//establishes connection to the database
/** @var mysqli $db */
require_once 'includes/database.php';

$sessionId = $_SESSION['id'];

//gets the users data from the database
$query = "SELECT * FROM users WHERE id = '$sessionId'";
$result = mysqli_query($db, $query);
//puts the data in an array
$user = mysqli_fetch_assoc($result);
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
<header>
    <h1>Settings</h1>
</header>
<main>
    <a href="editSettings.php">Verander persoonlijke gegevens</a>
    <h2><?= $user['first_name']?> <?= $user['infix']?> <?= $user['last_name']?></h2>
    <h3><?= $user['email']?></h3>
    <h3><?= $user['street_name']?> <?= $user['house_number']?></h3>
    <h3><?= $user['postal_code']?></h3>
    <h3><?= $user['city_name']?></h3>
</main>
<footer>

</footer>
</body>
</html>
