<?php

$connect = mysqli_connect("localhost","root","","fyp");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


?>