<?php
global $conn;
require_once('dbsConnect.php');
if( isset($_POST['name']) )
{
    $name = $_POST['name'];
}
else{
    $name = "";
    $errorMsg="chybí uživatelské jméno";
}

if( isset($_POST['email']) )
{
    $email = $_POST['email'];
}

if( isset($_POST['password']) )
{
    $passwd = $_POST['password'];
}

//todo implementovat registraci

$stmt = $conn->prepare("SELECT usernameFree(:name)");
$stmt->execute(['name' => $name]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$firstKey = array_key_first($result);
$result = $result[$firstKey];
if($result==1)
{
    echo 'uživatelské jméno volné';
}

function  emailToJson($mail)
{
    $split = explode("@", $mail);
    $host = $split[0];
    $splitDomain = explode('.', $split[1]);
    $tld = $splitDomain[sizeof($splitDomain) - 1];
    $domain = '';
    for ($i = 0; $i < sizeof($splitDomain)-1; $i++) {
        $domain=  $domain.'.'.$splitDomain[$i];
    }

    $domain=substr_replace($domain,'',0,1);


    $test = $host.'@'.$domain.'.'.$tld;
    if($test == $mail)
    {//echo true;
    }

    $output = '[{ "username":"'.$host.'", "domain":"'.$domain.'", "tld":"'.$tld.'"}]';
    // echo $output;
    return $output;

}

function validateMail($mail) {
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)==true)
    {
        return false;
    }
    else{
        return false;
    }
}


?>