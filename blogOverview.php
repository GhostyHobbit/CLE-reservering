<?php
/** @var mysqli $db */
require_once "database.php";


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
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <!-- Foto doet raar moet nog aangepast worden -->
    <!--    <img src="images/Logo-reserveringsysteem.png" alt="Logo" class="navbar-logo">-->
    <div class="navbar-middle"> <!-- Nav-Box Middle -->
        <a href="index.php">Home</a>
        <a href="blog.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
        <a href="contact.php">Contact</a>
    </div>
    <a href="login.php">Login</a>
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

</body>