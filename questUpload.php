<?php
session_start();
global $conn;
require_once('dbsConnect.php');
$formOk = false;

$questname='default';
$questXP=1;
$questMoney=1;
$questDscr='default description, pokud tohle vidíte něco se pokazilo';
$imageContent=null;
if( isset($_POST['name']) )
{
    $questname = $_POST['name'];

}
else{
    $errorMsg[]="chybí název questu";
}

if( isset($_POST['xp']) )
{
    $questXP = $_POST['xp'];

}
else{
    $errorMsg[]="chybí xp";
}

if( isset($_POST['reward']) )
{
    $questMoney = $_POST['reward'];

}
else{
    $errorMsg[]="chybí moni";
}

if( isset($_POST['description']) )
{
    $questDscr = $_POST['description'];

}
else{
    $errorMsg[]="chybí popis";
}




if (isset($_POST["submit"])) {

// kontroluje zda byl soubor nahrán
    if (isset($_FILES["image"])) {
      $image = $_FILES["image"];
      $imageName = $image["name"];
      $imageError = $image["error"];
      $imgExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
      $valid_extensions = array("jpeg", "jpg", "png");
// kontrluje formát souboru
      if (in_array($imgExt, $valid_extensions)) {
          // kontrolue zda nahrání proběhlo v pořádku
        if($imageError === 0){
          //kontroluje za není obráek moc velký
            if($image["size"] < 500000){
                // deklarujeme že upload proběhl v pořádku a lze odeslat do databáze
                $formOk = true;
                $imageContent = file_get_contents($image["tmp_name"]);
            }
            else{
                $errorMsg[]='obrázek je příliš velký(max povolená velikost je 500mb)';
            }

        }
        else{
            $errorMsg[]= "neco se pokazilo : " . $imageError ;
        }
      }
      else{
          $errorMsg[]="nepovolený formát obrázku";
      }

    }
    else{
        $errorMsg[]= 'chybí obrázek';
    }
}

if($formOk == true){

    try {
        $stmt = $conn->prepare("call CreateQuest(:questname,:questDscr,:questXP,:questMoney,:image)");
        $stmt->bindParam(':questname', $questname);
        $stmt->bindParam(':questDscr', $questDscr);
        $stmt->bindParam(':questXP', $questXP);
        $stmt->bindParam(':questMoney', $questMoney);
        $stmt->bindParam(':image', $imageContent,PDO::PARAM_LOB);
        $stmt->execute();
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

}
else{
$errorMsg[]='problém při připojení do databáze';
}

var_dump($errorMsg);
?>
