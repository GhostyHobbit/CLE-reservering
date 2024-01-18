<?php
session_start();
$_SESSION['id'] = 3;
$sessionId = $_SESSION['id'];
require_once 'includes/database.php';
/** @var array $db */

if (!empty($_SESSION)) {
    $login = true;
} else {
    $login = false;
}
if ($login) {
    //gets the users data from the database
    $query = "SELECT * FROM users WHERE id = '$sessionId'";
    $result = mysqli_query($db, $query);
//puts the data in an array
    $user = mysqli_fetch_assoc($result);
}
if (isset($_POST['submit'])) {
header('location: bestellen.php');
}

if (isset($_POST['submit'])) {
    $user_first_name = $_POST['user_first_name'];
    $user_infix = $_POST['user_infix'];
    $user_last_name = $_POST['user_last_name'];
    $city_name = $_POST['city_name'];
    $street_name = $_POST['street_name'];
    $house_number = $_POST['house_number'];
    $postal_code = $_POST['postal_code'];
    $rope_length = $_POST['rope_length'];
    $colour_amount = $_POST['colour_amount'];
    $colours = $_POST['colours'];
    $comments = $_POST['comments'];
    $rope_amount = $_POST['rope_amount'];




    $query = "INSERT INTO orders (user_first_name, user_infix, user_last_name, city_name, street_name, house_number, postal_code, rope_length, colour_amount, colours, comments, rope_amount) 
            VALUES ('$user_first_name', '$user_infix', '$user_last_name', '$city_name', '$street_name', '$house_number', '$postal_code', '$rope_length', '$colour_amount', '$colours', '$comments', '$rope_amount')";
    mysqli_query($db, $query);
    header('location: bestellen.php');
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
    <title>Bestelling Overzicht</title>
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
    <form action="bestellenOverview.php" method="post">
        <input type="hidden" id="user_first_name" name="user_first_name" value="<?php if ($login) { echo $user['first_name']; } else { echo $_GET['user_first_name'];}?>">
        <input type="hidden" id="user_infix" name="user_infix" value="<?php if ($login) { echo $user['infix']; } else { echo $_GET['user_infix'];}?>">
        <input type="hidden" id="user_last_name" name="user_last_name" value="<?php if ($login) { echo $user['last_name']; } else { echo $_GET['user_last_name'];}?>">
        <input type="hidden" id="city_name" name="city_name" value="<?php if ($login) { echo $user['city_name']; } else { echo $_GET['city_name'];}?>">
        <input type="hidden" id="street_name" name="street_name" value="<?php if ($login) { echo $user['street_name']; } else { echo $_GET['street_name'];}?>">
        <input type="hidden" id="house_number" name="house_number" value="<?php if ($login) { echo $user['house_number']; } else { echo $_GET['house_number'];}?>">
        <input type="hidden" id="postal_code" name="postal_code" value="<?php if ($login) { echo $user['postal_code']; } else { echo $_GET['postal_code'];}?>">
        <input type="hidden" id="rope_length" name="rope_length" value="<?php echo $_GET['rope_length'];?>">
        <input type="hidden" id="colour_amount" name="colour_amount" value="<?php echo $_GET['colour_amount'];?>">
        <input type="hidden" id="colours" name="colours" value="<?php echo $_GET['colours'];?>">
        <input type="hidden" id="comments" name="comments" value="<?php echo $_GET['comments'];?>">
        <input type="hidden" id="rope_amount" name="rope_amount" value="<?php $_GET['rope_amount'];?>">
        <input type="submit" name="submit" id="submit">
    </form>
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
