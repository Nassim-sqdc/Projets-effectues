<?php 
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>- Badge add -</title>
</head>
<body>
<header>
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
</header>
<?php


/*-------------Retrieving data sent from Modification_Badge.php--------------------------*/

if (isset($_POST['date_expiration_badge']) && isset($_POST['badge_number'])) 
{

    $date_expiration_badge = $_POST['date_expiration_badge'];
    $badge_number_Badge = $_POST['badge_number'];

    
    $sqlQuery = "INSERT INTO `badge`(`date_expiration_badge`, `badge_number`) 
                 VALUES ( :date_expiration_badge, :badge_number)";

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->bindParam(':date_expiration_badge',  $date_expiration_badge);
$accesStatement->bindParam(':badge_number', $badge_number_Badge);
$accesStatement -> execute();

   echo "Add to list<br> <br>";
   echo ("<br> Expiry date : " . $date_expiration_badge . '<br> Badge number : ' 
        . $badge_number_Badge);
} else {

    echo "Value not received";

}



?>
<footer>
     <div class= containerRetour>
        <form method='GET' action='Badge_Manage.php'>
    <br><br><button type="submit">Back to</button></form>
</footer>
