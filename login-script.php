<?php


$name = $_POST['name'];
$password =  $_POST['password'];
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");

//https://stackoverflow.com/questions/20556773/php-display-image-blob-from-mysql
?>