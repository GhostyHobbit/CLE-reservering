<?php
session_start();
/** @var mysqli $db */
require_once "includes/database.php";
if (!empty($_SESSION)) {
    $sessionId = $_SESSION['id'];
    $login = true;
    //gets the users data from the database
    $query = "SELECT * FROM users WHERE id = '$sessionId'";
    $result = mysqli_query($db, $query);
//puts the data in an array
    $user = mysqli_fetch_assoc($result);
} else {
    $login = false;
}
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $recap = $_POST['recap'];
    $image = $_POST['image'];

    $query = "INSERT INTO customerBlogPosts (title, text, recap, picture_link) VALUES ('$title', '$text', '$recap', '$image')";
    mysqli_query($db, $query);
    header('Location: blogOverview.php');
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
    <title>Klant Create Blog</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php" class="location">Blog</a>
        <a href="customerBlogOverview.php">Klant Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <?php if ($user['isAdmin']) {?>
            <a href="orders.php">Bestellingen</a>
        <?php }  else {?>
            <a href="bestellen.php">Bestellen</a>
        <?php } ?>
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <?php if ($login) { ?>
            <a href="profile.php">Profiel</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </div>
</nav>
<a href="blogOverview.php">Annuleren</a>
<form action="" method="post">
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title">

    <label for="recap">Samenvatting:</label>
    <input type="text" id="recap" name="recap">

    <label for="text">Tekst:</label>
    <textarea id="text" name="text" placeholder="Schrijf hier je tekst..."></textarea>

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
