<?php
if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";
//zet post data om naar variabelen
    $title = $_POST['title'];
    $recap = $_POST['recap'];
    $text = $_POST['text'];
    $image = $_POST['image'];
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
        $query = "INSERT INTO blogposts (title, recap, text, picture_link) VALUES ('$title', '$recap', '$text', '$image')";
        mysqli_query($db, $query);
        header(header:'Location: blogOverview.php');
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
<a href="blogOverview.php">Annuleren</a>
    <form action="" method="post">
        <label for="title">Titel:</label>
        <input type="text" id="title" name="title">

        <label for="recap">Samenvatting:</label>
        <input type="text" id="recap" name="recap">

        <label for="text">Tekst:</label>
        <textarea id="text" name="text">Schrijf hier je tekst...</textarea>

        <label for="image">Link naar foto:</label>
        <input type="text" id="image" name="image">

        <input type="submit" id="submit" name="submit">
    </form>
</body>
</html>
