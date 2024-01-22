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

$query = "SELECT id, title, recap, text, picture_link FROM customerblogposts";
$result = mysqli_query($db, $query);



while($row = mysqli_fetch_assoc($result)) {
    $blogs[] = $row;
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
    <link rel="stylesheet" href="css/blogs.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Klant Blog</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php" >Blog</a>
        <a href="customerBlogOverview.php" class="location">Klant Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <?php if ($login && $user['isAdmin']) {?>
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

<main>
    <div class="heading">
        <div>
            <h1>Welkom bij de klanten blog!</h1>
            <?php if ($login) { ?>
                <a href="customerBlogCreate.php" class="create">Nieuwe Blog</a>
            <?php }?>
        </div>
        <p>
            Hier kunnen jullie alle projecten delen die gemaakt zijn met wol van de Wolhoop!
            Haak projecten, brei projecten en al het andere! Deel de liefde voor de Wolhoop
            met andere leden en laat je talent zien!
        </p>
    </div>
    <section id="all-blogs">
        <?php if (isset($blogs)) {?>
            <?php foreach ($blogs as $blog) {?>
                    <div class="article-one-bottom">
                <article class="blog-1">
                    <img src="<?= $blog['picture_link'] ?>" class="blog-images" alt="">
<!--                    <img src="images/1kleur.jpg" alt="placeholder" class="blog-images">-->
                    <div class="text">
                        <h2><?= $blog['title']?></h2>
                        <p><?= $blog['recap']?></p>
                        <a href="customerBlog.php?id=<?= $blog['id'] ?>">Open</a>
                    </div>
                </article>
                    </div>
            <?php } ?>
        <?php } else {?>
            <p>Er zijn nog geen blogs.</p>
        <?php } ?>
    </section>
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