<?php
session_start();
/** @var mysqli $db */
require_once "includes/database.php";
if (!empty($_SESSION)) {
    $login = true;
} else {
    $login = false;
}

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$userId'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
}
if (isset($_POST["message"])) {
    $email = $_POST['email'];
    mail("mickeyveldhuizen@gmail.com", "contact pagina Wolhoop",
        $_POST["message"] . "From: '$email'");
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
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap">
    <title>Contact Pagina</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
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
    <img src="images/wool.png" alt="wol-collage">
    <div>
        <h1>Over Wolhoop</h1>
        <p>lorum ipsum blabla ur mom</p>
        <h2>Contact</h2>
        <div class="links">
            <a href="https://www.instagram.com/dewolhoopspinning/">Instagram: @dewolhoopspinning</a>
            <a href="https://www.facebook.com/groups/3217490328265360/media" class="facebook">Facebook: De Wolhoop</a>
        </div>
        <form method="post" action="contact.php">
            <label for="email">Jouw e-mail:</label>
            <input type="text" name="email" id="email" <?php if (isset($user['email'])) {?> value=<?= $user['email'] ?><?php }?>>
            <label for="message">Bericht:</label>
            <textarea name="message" id="message"></textarea>
            <input type="submit">
        </form>





    </div>
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
