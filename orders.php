<?php
/** @var mysqli $db */
require_once "includes/database.php";


$query = "SELECT * FROM orders WHERE complete = '0'";
$result = mysqli_query($db, $query);


while($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
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
    <title>Document</title>
</head>
<body>
<?php foreach ($orders as $order) { ?>
    <p>Naam: <?= $order['user_first_name']?> <?= $order['user_infix']?> <?= $order['user_last_name']?></p>
    <p>Stad: <?= $order['city_name']?></p>
    <p>Straatnaam: <?= $order['street_name']?> <?= $order['house_number']?></p>
    <p>Postcode: <?= $order['postal_code']?></p>
    <p>Lengte wol: <?= $order['rope_length']?>cm</p>
    <p>Hoeveel kleuren: <?= $order['colour_amount']?></p>
    <p>Welke kleuren: <?= $order['colour1']?> <?= $order['colour2']?> <?= $order['colour3']?></p>
    <p>Opmerkingen: <?= $order['comments']?></p>
    <p>Hoevaak: <?= $order['rope_amount']?></p>
    <br>

<?php } ?>


</body>
</html>
