<?php
/** @var mysqli $db */
require_once "includes/database.php";
// required when working with sessions
session_start();

// Is user logged in?
if (empty($_SESSION)) {
    $login = false;
    $user = [
        'email' => ''
    ];
} else {
    header('location: index.php');
}

$errors = [];
$userPassword = '';
$emailError = '';
$passwordError = '';
$email = '';

// Get form data
if (isset($_POST['submit'])) {
    // form data beveiligd ophalen
    $email = mysqli_escape_string($db, $_POST['email']);
    // Server-side validation
    if($_POST['email'] === '') {
        $emailError = 'Email mag niet leeg zijn';
        $errors[] = $emailError;
    }
    if($_POST['password'] === '') {
        $passwordError = 'Wachtwoord mag niet leeg zijn';
        $errors[] = $passwordError;
    }
    // If data valid
    if(empty($errors)) {
        $email = mysqli_escape_string($db, $_POST['email']);
        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($db, $query)
        or die('Error '.mysqli_error($db).' with query '.$query);

        $users = [];

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
        }  else {
            $errors['loginFailed'] = 'Email of wachtwoord is incorrect';
        }

        // check if the user exists
        if($user['email'] === $email) {
            $userPassword = $_POST['password'];
            $userHash = $user['password'];
            $firstName = $user['first_name'];

            if(password_verify($userPassword, $userHash)){
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $user['id'];
                header('Location: index.php');
                    exit;
            } else {
                $errors['loginFailed'] = 'Email of wachtwoord is incorrect';
            }
        }
    }
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
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&family=Annie+Use+Your+Telescope&display=swap"
          rel="stylesheet">
    <title>Log in</title>
</head>
<body>
<nav>
    <div class="navbar-middle">
        <img src="images/Logo-reserveringsysteem.png" alt="wolhoop-logo">
        <a href="index.php">Home</a>
        <a href="blogOverview.php">Blog</a>
        <a href="customerBlogOverview.php">Klant Blog</a>
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
        <a href="contact.php">Over Wolhoop</a>
    </div>
</nav>
<main>
    <img src="images/banner1.jpg" alt="banner">
    <div class="form">
    <form method = post>
        <h2 class="title">Inloggen</h2>
        <div>
            <label for="email">Email</label>
            <input class="input" id="email" type="text" name="email" value="<?= htmlentities($email) ?? '' ?>" />
            <p><?= htmlentities($emailError) ?? '' ?></p>
        </div>

        <div>
            <label for="password">Wachtwoord</label>
            <input class="input" id="password" type="password" name="password"/>
            <p><?= htmlentities($passwordError) ?? '' ?></p>
        </div>

        <?php if(isset($errors['loginFailed'])) { ?>
            <p><?=htmlentities($errors['loginFailed'])?></p>
        <?php } ?>

        <button type="submit" name="submit" class="submit">Inloggen</button>
    </form>
        <a href="register.php">Geen profiel? Registreer hier</a>
    </div>
    <img src="images/banner.jpg" alt="banner">
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

