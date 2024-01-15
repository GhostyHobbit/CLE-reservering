<?php
/** @var mysqli $db */
include_once 'includes/database.php';
session_start();

if (!empty($_SESSION)) {
    $login = true;
} else {
    $login = false;
}

$query = "SELECT id, title, recap, picture_link FROM blogposts ORDER BY id DESC LIMIT 3";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($result)) {
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
    <link href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap"
          rel="stylesheet">
    <title>Home</title>
</head>
<body>

<!-- Navbar Begint hier -->
<nav>
    <!-- Foto doet raar moet nog aangepast worden -->
    <div class="navbar-middle"> <!-- Nav-Box Middle -->
        <img src="images/Logo-reserveringsysteem.png" alt="Logo" class="navbar-logo">
        <a href="blogOverview.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
        <a href="contact.php">Contact</a>
        <a href="createBlog.php">CREATE</a>
    </div>
<div class="login">
<!--    <a href="--><?php //$authenticationLink = $loginStatus ?><!--</a>-->
<!--    --><?php //= $_SESSION['id']?>
    <?php if ($login) { ?>
        <a href="logout.php">Log Uit</a>
    <?php } else {?>
        <a href="login.php">Login</a>
    <?php }?>
</div>

</nav>
<!-- Navbar Eindigt hier-->

<!-- Header Begint hier-->
<header>
    <div class="header-left">
        <h1>De Wolhoop</h1>
        <p>Welkom bij Wolhoop, waar de magie van wol tot leven komt! Wij zijn jouw go-to bestemming voor alles wat met
            wol te maken heeft, en we kunnen niet wachten om je onder te dompelen in een wereld van kleur, textuur en
            creativiteit. Of je nu op zoek bent naar een explosie van kleuren en unieke texturen met onze
            gepersonaliseerde wol, of simpelweg wilt genieten van de betrouwbare warmte van klassieke wol, bij Wolhoop
            hebben we het allemaal! Bij Wolhoop geloven we in de kracht van creativiteit. We streven ernaar om de meest
            unieke en hoogwaardige wolproducten aan te bieden, zodat jij, of je nu een ervaren breier bent of net begint
            aan je haakavontuur, de perfecte wol vindt om jouw projecten tot leven te brengen. Dus, omarm de warmte,
            kleur en vreugde van wol met Wolhoop! Laat ons jouw metgezel zijn terwijl je de prachtige wereld van
            handwerk verkent. Happy crafting! 🌈🧶✨</p>
    </div>

    <div class="header-right">
        <h1>Foto's</h1>
        <img src="images/Logo-reserveringsysteem.png" alt class="header-images">
        <img src="images/Logo-reserveringsysteem.png" class="header-images">
        <img src="images/Logo-reserveringsysteem.png" class="header-images">
    </div>
</header>
<!-- Header Eindigt hier-->

<main>
    <section id="recommendations">
        <div id="recent-blogs">

            <?php if (isset($blogs)) { ?>
                <?php foreach ($blogs as $blog) { ?>
                    <article class="article-one">
                        <img src="<?= $blog['picture_link'] ?>" class="blog-images">
                        <div class="article-one-bottom">
                            <h2> <?= $blog['title'] ?> </h2>
                            <p><?= $blog['recap'] ?></p>
                            <a href="blog.php?id=<?= $blog['id'] ?>">Open</a>
                        </div>
                    </article>
                <?php } ?>
            <?php } else { ?>
                <h1> Excuses voor het ongemak er zijn op dit moment geen blogs</h1>
            <?php } ?>
        </div>
        <!--        --><?php //if isset($blogs)?>
        <div id="kleuren">
            <img src="images/Logo-reserveringsysteem.png" class="kleuren-images" alt="">
            <img src="images/Logo-reserveringsysteem.png" class="kleuren-images" alt="">
            <img src="images/Logo-reserveringsysteem.png" class="kleuren-images" alt="">
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