<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');

if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
} 
?><!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="flow.css">
        <title>- Delete user -</title>
    </head>
    <body> 
<header>
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
</header>

<?php
/*-------------Retrieving data sent from Modification_Badge.php--------------------------*/
    if (isset($_POST['user_login']))
    {
        $user_login = htmlspecialchars(trim($_POST['user_login']));
        

        $QueryVerif = "SELECT * FROM user WHERE user_login = :user_login";
        $stmt = $mysqlClient->prepare($QueryVerif);
        $stmt->execute([
            ':user_login' => $user_login
        ]);
        $UExistant = $stmt->fetch(PDO::FETCH_ASSOC);
/*---------------------------------------CHECK IF THE USER IS ALREADY IN THE DATABASE--------------------------------*/        
        if (!$UExistant){
            echo "this user does not exist";
        } 
/*---------------------------------------OTHERWISE IMPLEMENT THE USER--------------------------------*/   
        else {
             $sqlQuery = "DELETE FROM `user` WHERE user_login = :user_login";

            $accesStatement = $mysqlClient->prepare($sqlQuery);
            $accesStatement->bindParam(':user_login', $user_login);
            $accesStatement -> execute();

         ?> 
    <div class= container><?php 
     echo "<br>" . htmlspecialchars("Delete employee");
}       
/*---------------------------------------IF BUG IN FORM--------------------------------*/   

    } else {
    echo  "<br>" . htmlspecialchars("Data not sent");
    }?> </div>
    </body>
    <footer>
     <div class= containerRetour>
        <form method='GET' action='User_Maintenance.php'>
    <br><br><button type="submit">Back to</button></form></footer>