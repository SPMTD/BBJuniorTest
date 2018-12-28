<?php

$host = "localhost";
$database = "bbtest";
$user = "root";
$password = "root";

$db = new mysqli($user, $password, $database) or die ("Error : " . mysqli_connect_error());