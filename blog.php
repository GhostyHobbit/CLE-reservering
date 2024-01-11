<?php
/** @var mysqli $db */
require_once "includes/database.php";
$id = $_GET['id'];
$query = "SELECT * FROM blogposts WHERE id = '$id'";
$result = mysqli_query($db, $query) or die('Error '.mysqli_error($db).' with query '.$query);
//info bruikbaar maken
$blog = mysqli_fetch_assoc($result);
//database sluiten
mysqli_close($db);
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
    <h1><?= $blog['title'] ?></h1>
    <p><?= $blog['recap'] ?></p>
    <p><?= $blog['text'] ?></p>
</body>
</html>
