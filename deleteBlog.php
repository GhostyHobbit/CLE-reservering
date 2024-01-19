<?php
/** @var mysqli $db */
require_once 'includes/database.php';
    if (isset($_POST['submit'])) {
        $blogId = $_GET['id'];
        $query = "DELETE FROM blogposts WHERE id = '$blogId'";
        $result = mysqli_query($db, $query);
        header('location: blogOverview.php');
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
    <form method="post" action="">
        <input type="submit" name="submit" id="submit" value="Weet je het zeker?">
    </form>
    <a href="blogOverview.php">Annuleren</a>
</body>
</html>
