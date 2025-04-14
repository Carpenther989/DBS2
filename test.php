<?php
$str = 'testuser1@gmail.com';
$email = $str;
if(filter_var($email, FILTER_VALIDATE_EMAIL)==true)
{
  echo(emailToJson($email));
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

?>