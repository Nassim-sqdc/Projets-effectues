<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}
/*-----------------------------------Récupération de la table Utilisateur--------------------------------------*/
$sqlQuery = 'SELECT
        user.user_login,
        quality.ID_quality,
        badge.ID_badge,
        badge.badge_number,
        quality.job_name,
        user.user_email

    FROM 
        user
    LEFT JOIN badge
    ON user.badge_ID_badge = badge.ID_badge
    LEFT JOIN quality
    ON user.ID_Quality = quality.ID_quality';

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->execute();
$users = $accesStatement->fetchAll();
?>
<!-----------------------------------User list------------------------------->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>-  User list  -</title>
</head>
<body> 
<header>
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
<div class= "fixed-message">
<form method="POST" action="User_Search.php">
    <input type="text" name="search" placeholder="Found a user (login, mail adress or username)" required>
    <button type="submit">Rechercher</button>
</form>
</div>

</header>
    <div class= container> 
    <?php 
    foreach ($users as $user) {?>
    
    <br><br><li> 
    
    <?php
    $user['user_login'];
    $user['ID_badge'];

    if ((isset ($user["user_login"])))
    {   
        echo "Login : " . htmlspecialchars($user["user_login"]). '<br>';
        echo "Email: " . htmlspecialchars($user['user_email']) . "<br>";
        echo "Badge number : " . htmlspecialchars($user['badge_number']) . "<br> ";
        echo "Right of access : " . htmlspecialchars($user['job_name']) . "<br><br>";
    } 
    
    else {    
        echo "Missing data for this user";
    }


?>
</li>
<br>
            <?php }?>
</div>
</body>
</html>
<footer>
    <div class= containerRetour>
        <form method='GET' action='Admin_interface.php'>
    <br><br><button type="submit">Back to</button></form>
</footer>