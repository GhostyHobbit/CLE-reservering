<?php
/** @var mysqli $db */
require_once "includes/database.php";
// required when working with sessions
session_start();

$login = false;
// Is user logged in?
$user = [
    'email' => ''
];
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
                $login = true;
                $_SESSION['login'] = $login;
            } else {
                $errors['loginFailed'] = 'Email of wachtwoord is incorrect';
            }
        }
    }
    // Get user data from result
    // Check if the provided password matches the stored password in the database
    // Store the user in the session
    // Redirect to secure page
    // Credentials not valid
    //error incorrect log in
    // User doesn't exist
    //error incorrect log in
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
        <a href="kleuren.php">Kleuren</a>
        <a href="bestellen.php">Bestellen</a>
    </div>
</nav>
    <form method = post>
        <h2 class="title">Log in</h2>

        <?php if ($login) {
            header('Location: index.php?login=false');
            exit;
         } else { ?>
        <label for="email">Email</label>
        <input class="input" id="email" type="text" name="email" value="<?= htmlentities($email) ?? '' ?>" />
        <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
        <p class="help is-danger">
            <?= htmlentities($emailError) ?? '' ?>
        </p>

        <label for="password">Wachtwoord</label>
        <input class="input" id="password" type="password" name="password"/>
        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

        <?php if(isset($errors['loginFailed'])) { ?>
            <div class="notification is-danger">
                <button class="delete"></button>
                <?=htmlentities($errors['loginFailed'])?>
            </div>
        <?php } ?>


        <p class="help is-danger">
            <?= htmlentities($passwordError) ?? '' ?>
        </p>

        <button class="button is-link is-fullwidth" type="submit" name="submit">Log in Met Email</button>

        <a href="register.php" class="button is-fullwidth">Registreer hier</a>
    </form>

        <?php } ?>
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

