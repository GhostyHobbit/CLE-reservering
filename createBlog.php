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
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Create Blog</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blog.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a> <!--moet in admin bestellingen overzicht worden-->
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <a href="login.php" >Login</a>
    </div>
</nav>
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
