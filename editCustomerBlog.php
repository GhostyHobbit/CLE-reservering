<?php
session_start();
/** @var mysqli $db */
require_once "includes/database.php";

if (!empty($_SESSION)) {
    $login = true;
} else {
    $login = false;
}

$id = $_GET['id'];
$query = "SELECT * FROM customerBlogPosts WHERE id = '$id'";
$result = mysqli_query($db, $query) or die('Error '.mysqli_error($db).' with query '.$query);
//info bruikbaar maken
$blog = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";
//zet post data om naar variabelen
    $title = $_POST['title'];
    $recap = $_POST['recap'];
    $text = $_POST['text'];
    $image = $_POST['picture_link'];
//zet errors neer als ze er zijn
    if ($title === '') {
        $errors['title'] = "Je moet nog een titel invullen!";
    }
    if ($recap === '') {
        $errors['recap'] = "Je moet een samenvatting invullen!";
    }
    if ($text === '') {
        $errors['text'] = "Je moet nog tekst invullen!";
    }
    if ($image === '') {
        $errors['image'] = "Je moet de link van de foto invullen!";
    }
//check of er niks leeg is
    if ($title !== '' && $recap !== '' && $text !== '') {

//zet alle info in de database
        $query = "UPDATE customerBlogPosts SET text='$text',recap='$recap',title='$title',picture_link='$image' WHERE id = '$id'";
        mysqli_query($db, $query);
        header(header: 'Location: index.php');
    }
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
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" value="<?= $blog['title']?>">

    <label for="recap">Samenvatting:</label>
    <input type="text" id="recap" name="recap" value="<?= $blog['recap']?>">

    <label for="text">Tekst:</label>
    <textarea id="text" name="text" placeholder="Schrijf hier je tekst..."><?= $blog['text']?></textarea>

    <label for="image">Link naar foto:</label>
    <input type="text" id="picture_link" name="picture_link" value="<?= $blog['picture_link']?>">

    <input type="submit" id="submit" name="submit">
</form>
</body>
</html>
