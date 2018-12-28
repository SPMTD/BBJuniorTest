<?php
require_once "objects/database.php";

$query = "SELECT * FROM pidgeons";
$result = mysqli_query($db, $query);

$res_pidgeons = [];



?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <title>Home</title>
</head>
<body>

</body>