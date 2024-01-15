<?php
session_start();

//establishes connection to the database
/** @var mysqli $db */
require_once 'includes/database.php';

$sessionId = $_SESSION['id'];

//gets the users data from the database
$query = "SELECT * FROM users WHERE id = 'sessionId'";
$result = mysqli_query($db, $query);
//puts the data in an array
$user = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])) {
    "UPDATE users SET first_name = '$_POST'['firstName'], infix = '$_POST'['infix'], last_name = '$_POST'['lastName'], 
                      email = '$_POST'['email'], street_name = '$_POST'['streetName'], house_number = '$_POST'['houseNumber'],
                      postal_code = '$_POST'['postalCode'], city_name = '$_POST'['cityName'] 
             WHERE id = '$_SESSION'['id']";
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
    <title>Gegevens aanpassen</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blog.php">Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
    </div>
    <div class="login">
        <a href="login.php" >Login</a>
    </div>
</nav>

<header>

</header>
<main>
    <form method="post">
        <div>
            <label for="firstName">Voornaam</label>
            <input type="text" name="firstName" id="firstName">
        </div>
        <div>
            <label for="infix">Tussenvoegsel</label>
            <input type="text" name="infix" id="infix">
        </div>
        <div>
            <label for="lastName">Achternaam</label>
            <input type="text" name="lastName" id="lastName">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="streetName">Straatnaam</label>
            <input type="text" name="streetName" id="streetName">
        </div>
        <div>
            <label for="houseNumber">Huisnummer</label>
            <input type="text" name="houseNumber" id="houseNumber">
        </div>
        <div>
            <label for="postcode">Postcode</label>
            <input type="text" name="postcode" id="postcode">
        </div>
        <div>
            <label for="city">Plaats</label>
            <input type="text" name="city" id="city">
        </div>
        <div>
            <button type="submit" class="button">Plaats Veranderingen</button>
        </div>
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
