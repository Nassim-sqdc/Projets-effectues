
<?php session_start();
    require_once('C:/wamp64/www/BDD_Connexion.php');
    require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');

    if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>DataBase </title>
</head>
<body><?php

/*-------------Récupération des données envoyée depuis Modification_Badge.php--------------------------*/

if (isset($_POST['Id_Badge_Badge']) && isset($_POST['Date_Expiration_Badge']) && isset($_POST['Numero_Badge']) 
&& isset($_POST['utilisateur_id_utilisateur_utilisateur'])) 
{
    $Id_Badge_Badge= $_POST['Id_Badge_Badge'];
    $Date_Expiration_Badge = $_POST['Date_Expiration_Badge'];
    $Numero_Badge_Badge = $_POST['Numero_Badge'];
    $utilisateur_id_utilisateur_utilisateur = $_POST['utilisateur_id_utilisateur_utilisateur'];
    
    
    $sqlBadge = "SELECT `Id_Badge_Badge` 
    FROM `badge`
    WHERE Id_Badge_Badge = $Id_Badge_Badge ";

$accesStatementBadge = $mysqlClient->prepare($sqlBadge);
$accesStatementBadge->execute();
$Badge = $accesStatementBadge->fetchAll();  

if ($Badge)
{   
    $sqlQuery = "UPDATE `badge`
    SET Id_Badge_Badge = $Id_Badge_Badge,
        Date_Expiration_Badge = '$Date_Expiration_Badge', 
        Numero_Badge = $Numero_Badge_Badge, 
        utilisateur_id_utilisateur_utilisateur = $utilisateur_id_utilisateur_utilisateur
    WHERE badge.Id_Badge_Badge = $Id_Badge_Badge";
   
   $accesStatement = $mysqlClient->prepare($sqlQuery);
   $accesStatement->execute();

   echo ", Modification effectuer<br> <br>";
   echo ("<br> Date d'expiration : : " . $Date_Expiration_Badge . '<br> Numero du badge : ' 
        . $Numero_Badge_Badge . '<br> utilisateur_id_utilisateur_utilisateur : ' .$utilisateur_id_utilisateur_utilisateur);
}


}else{ 
    echo "<br>Badge non reconnu dans la BDD";
}