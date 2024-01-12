<?php
session_start();

//establishes connection to the database
/** @var mysqli $db */
require_once 'database.php';

//gets the users data from the database
$query = "SELECT * FROM users WHERE id = '$_SESSION'['id']";
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
    <h2><?= $user['first_name']?> <?= $user['infix']?> <?= $user['first_name']?></h2>
    <h3><?= $user['email']?></h3>
    <h3><?= $user['street_name']?> <?= $user['house_number']?></h3>
    <h3><?= $user['postal_code']?></h3>
    <h3><?= $user['city']?></h3>
</main>
<footer>

</footer>
</body>
</html>
