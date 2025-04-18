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
        <title>- Client interface - </title>
        <header>
        <?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
        </header>
        <div class="containerTitle"></div>
</head>
</html>





<footer>
    <div class= containerRetour>
        <form method='GET' action='Logout.php'>
    <br><br><button type="submit">Logout</button></form>
</footer>