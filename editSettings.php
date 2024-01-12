<?php
session_start();

//establishes connection to the database
/** @var mysqli $db */
require_once 'includes/database.php';

//gets the users data from the database
$query = "SELECT * FROM users WHERE id = '$_SESSION'['id']";
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
    <title>Document</title>
</head>
<body>
<header>

</header>
<main>
    <form>
        <div>
            <label for="firstName"></label>
            <input type="text" name="firstName" id="firstName">
        </div>
        <div>
            <label for="infix"></label>
            <input type="text" name="infix" id="infix">
        </div>
        <div>
            <label for="lastName"></label>
            <input type="text" name="lastName" id="lastName">
        </div>
        <div>
            <label for="email"></label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="streetName"></label>
            <input type="text" name="streetName" id="streetName">
        </div>
        <div>
            <label for="houseNumber"></label>
            <input type="text" name="houseNumber" id="houseNumber">
        </div>
        <div>
            <label for="postcode"></label>
            <input type="text" name="postcode" id="postcode">
        </div>
        <div>
            <label for="city"></label>
            <input type="text" name="city" id="city">
        </div>
        <div>
            <button type="submit" class="button">Plaats Veranderingen</button>
        </div>
    </form>
</main>
<footer>

</footer>
</body>
</html>
