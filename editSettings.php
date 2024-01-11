<?php
session_start();

//establishes connection to the database
/** @var mysqli $db */
require_once 'database.php';
$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());

//gets the users data from the database
$query = "SELECT * FROM users WHERE email = '$_SESSION'['email']";
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

</header>
<main>
    <form>
        <?php

        ?>
        <div>
            <label for=""></label>
            <input type="" name="" id="">
        </div>

    </form>
</main>
<footer>

</footer>
</body>
</html>
