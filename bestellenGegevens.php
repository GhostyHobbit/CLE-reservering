<?php
$_GET['comments'];
//
$test = $_GET['rope_amount'];
$get = $_GET;
print_r($get)
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
    <?= $test?>
    <form action="bestellenOverview.php?colour_amount=" method="get">
        <input type="text" name="test" id="test">
        <input type="submit" id="submit" name="submit">
    </form>
</body>
</html>
