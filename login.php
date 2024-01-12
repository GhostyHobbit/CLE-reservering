<?php
//establishes connection to the database.php
/** @var mysqli $db */
require_once 'database.php';

$login = false;
//redirects user if there is a session going already
if (!empty($_SESSION)) {
    header('Location: index.php');
    exit;
}

//if user submits data
if (isset($_POST['submit'])) {
    //save data in variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    //gets the users data from the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    //puts the data in an array
    $user = mysqli_fetch_assoc($result);
    //verifies the password of the user
    if (password_verify($password, $user['password'])) {
        //verifies the email of the user
        if ($email == $user['email']) {

            $login = true;

            session_start();
            $_SESSION['email'] = $user['email'];
            $_SESSION['isAdmin'] = $user['isAdmin'];
            //redirects the user to the homepage (not the secure page yet)
            header('Location: index.php');
            exit;
        }

    }

}
//closes the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<main>
    <section>
        <img src="/images/placeholder-image.jpg" alt="">
    </section>
    <section class="login-section">
        <h1>Login</h1>
        <form action="" method="post">
            <div>
                <label for="email">E-mail</label>
                <input name="email" id="email" type="email">
                <p></p>
            </div>
            <div>
                <label for="password">Wachtwoord</label>
                <input name="password" id="password" type="password">
            </div>
            <div>
                <button type="submit" class="button">Login</button>
            </div>
        </form>
        <p>
            Heb je nog geen account?
        </p>
        <p>
            <a href="#">Registreer</a> hier.
        </p>
    </section>
    <section>
        <img src="/images/placeholder-image.jpg" alt="">
    </section>
</main>
<footer>

</footer>
</body>
</html>
