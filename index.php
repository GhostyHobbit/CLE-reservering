<?php
/** @var mysqli $db */
include_once 'includes/database.php';
session_start();

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

$query = "SELECT id, title, recap, picture_link FROM blogposts ORDER BY id DESC LIMIT 3";
$result = mysqli_query($db, $query);


while ($row = mysqli_fetch_assoc($result)) {
    $blogs[] = $row;
}

// verkocht eigenschap nog toevoegen bij database en later aanpassen
$queryColor = "SELECT * FROM colours ORDER BY id LIMIT 3";
$resultColor = mysqli_query($db, $queryColor);

while ($row2 = mysqli_fetch_assoc($resultColor)) {
    $colors[] = $row2;
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
    <link href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap"
          rel="stylesheet">
    <title>Home</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <div class="navbar-middle"> <!-- Nav-Box Middle -->
        <img src="images/Logo-reserveringsysteem.png" alt="Logo" class="navbar-logo">
        <a href="index.php" class="location">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="customerBlogOverview.php">Klant Blog</a>
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
<!-- Navbar Eindigt hier-->

<!-- Header Begint hier-->
<header>
    <div class="header-left">
        <div class="article-left-bottom">
            <h1>De Wolhoop</h1>
            <p>Welkom bij de Wolhoop! Mijn kleine bedrijfje voor liefhebbers van handwerk. Ik verkoop geverfde wol in een
                spectrum aan kleuren en combinaties. Via deze website verkoop ik deze mooie bolletjes en kan je ook kijken naar wat
                ik eerder heb gemaakt. Neem een kijkje op deze website en zoek de perfecte wol uit voor jouw project!
            </p>
            <p>Happy Crafting!!</p>
        </div>
    </div>
    <div class="header-right">
        <img src="images/homepage.png" alt class="header-images">
    </div>
</header>
<!-- Header Eindigt hier-->

<main>
    <section id="recent-blogs">
        <h1>Recente Blogs</h1>
        <div id="recent-blog">
            <?php if (isset($blogs)) { ?>
                <?php foreach ($blogs as $blog) { ?>
                    <div class="article-one">
                        <div class="article-one-bottom">
                            <img src="<?= $blog['picture_link'] ?>" class="blog-images" alt="blog-foto">
                            <h3><?= $blog['title'] ?></h3>
                            <p><?= $blog['recap'] ?></p>
                            <div class="button-to-right">
                                <a href="blog.php?id=<?= $blog['id'] ?>" class="blog-button">Lees meer</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h1>Excuses voor het ongemak er zijn op dit moment geen blogs</h1>
            <?php } ?>
        </div>
    </section>
    <section id="index-besteller">
        <h1> Best verkocht kleuren</h1>
        <div id="kleuren">
            <?php if (isset($colors)) { ?>
                <?php foreach ($colors as $color) { ?>
                    <div class="bestseller-color">
                        <div class="color-article">
                            <img src="<?php echo $color['picture_link'] ?>" class="blog-images" alt="Picture">
                            <h3><?= $color['colour'] ?></h3>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>Nog geen bestsellers</p>
            <?php } ?>
        </div>
        <div class="all-color-button">
            <a href="kleuren.php" class="blog-button">Bekijk alle kleuren</a>
        </div>
    </section>
    <footer>
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <div>
            <img src="images/instagram.png" alt="instagram-logo">
            <a href="https://www.instagram.com/dewolhoopspinning/">@dewolhoopspinning</a>
            <img src="images/facebook.png" alt="facebook-logo">
            <a href="https://www.facebook.com/groups/3217490328265360">De Wolhoop</a>
        </div>
    </footer>

</main>
</body>
</html>