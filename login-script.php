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

$name='testUser';
$password='';

if( isset($_POST['name']) )
{
    $name = $_POST['name'];
    echo $name;
}

if( isset($_POST['password']) )
{
    $password = $_POST['password'];
echo 'dykmoremameheslo';
}


$stmt = $conn->prepare("SELECT getHashByName(:name)");
$stmt->execute(['name' => $name]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$firstKey = array_key_first($result);
$result = $result[$firstKey];
//echo $result;
echo '<br>';
$validuser = password_verify($password, $result);

if($validuser) {
// TODO funkcionalita přihlašování
}
else{

    echo '<script type="text/javascript">
           window.location = "login.php?error=wrongpassword";
      </script>';
}



//https://stackoverflow.com/questions/20556773/php-display-image-blob-from-mysql
?>