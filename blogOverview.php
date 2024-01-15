<?php
/** @var mysqli $db */
require_once "includes/database.php";


$query = "SELECT id, title, recap, text, picture_link FROM blogposts";
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Blog</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
        <a href="contact.php">Over Wolhoop</a>
    </div>
    <div class="login">
        <a href="login.php" >Login</a>
    </div>
</nav>

<main>
    <section id="all-blogs">
        <?php foreach ($blogs as $blog) {?>
            <article class="blog-1">
                <img src="<?= $blog['picture_link'] ?>" class="blog-images" alt="">
                <div>
                    <h1><?= $blog['title']?></h1>
                    <p><?= $blog['recap']?></p>
                    <a href="blog.php?id=<?= $blog['id'] ?>">Open</a>
                </div>
            </article>
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