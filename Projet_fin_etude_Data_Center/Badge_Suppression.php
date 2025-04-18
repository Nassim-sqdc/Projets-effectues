<?php 
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');

if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>- Badge suppression -</title>
</head>
<body>
<header>
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
</header>

<?php
/*-------------Retrieving data sent from Modification_Badge.php--------------------------*/
if (isset($_POST['badge_number'])) 
{
    $badge_number = (int)$_POST['badge_number'];
    
    $sqlQuery = "SELECT `badge_number` 
    FROM `badge`
    WHERE badge_number = :badge ";

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->bindParam(':badge', $badge_number);
$accesStatement -> execute();
$Badge_Number = $accesStatement->fetchAll();
 
if ($Badge_Number){

    $sqlQueryNumber = "DELETE FROM `badge` 
                        WHERE badge.badge_number = :badge ";
    $accesStatement = $mysqlClient->prepare($sqlQueryNumber);
    $accesStatement->bindParam(':badge', $badge_number);
    $accesStatement->execute();
    
    echo "Badge n°" . $badge_number . " has been successfully removed <br> <br>";

} else {
    
    echo "The selected number does not correspond to any badge";
    
}
}

?>
</body>
<footer>
     <div class= containerRetour>
        <form method='GET' action='Badge_Manage.php'>
    <br><br><button type="submit">Back to</button></form>
</footer>