<?php
//------------------------------------
$host = "localhost";
$user = "frantaVomacka";
$password = "kekw";
$dbname = "tarkov_wiki";
try {
    $conn = new pdo("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ":)";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
//---------------------------------



//$name = $_POST['name'];
//$password =  $_POST['password'];
$stmt = $conn->prepare("SELECT getHashByName(:name)");
$stmt->execute(['name' => 'testUser']);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$firstKey = array_key_first($result);
$result = $result[$firstKey];
echo $result;

//https://stackoverflow.com/questions/20556773/php-display-image-blob-from-mysql
?>