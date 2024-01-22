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

    $isAdmin = $user['isAdmin'];
} else {
    $login = false;
    $isAdmin = false;
}

$id = $_GET['id'];
$query = "SELECT * FROM customerBlogPosts WHERE id = '$id'";
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
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Blog</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="customerBlogOverview.php" class="location">Klant Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
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
<main>
    <?php if (isset($user['id'])) {?>
        <?php if ($user['id'] == $blog['user_id']) {?>
            <a href="editCustomerBlog.php?id=<?=$id ?>">edit</a>
            <a href="customerBlogDelete.php?id=<?=$id ?>">delete</a>
        <?php } ?>
    <?php } ?>
    <?php if (isset($user['isAdmin']) && $user['isAdmin']) {?>
        <a href="editCustomerBlog.php?id=<?=$id ?>">edit</a>
        <a href="customerBlogDelete.php?id=<?=$id ?>">delete</a>
    <?php }?>
    <h1><?= $blog['title'] ?></h1>
    <p><?= $blog['recap'] ?></p>
    <p><?= $blog['text'] ?></p>
</main>
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
