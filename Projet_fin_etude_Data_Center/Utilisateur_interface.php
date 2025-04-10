<?php 
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');

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
        <title>Interface Client</title>
        <header>Bonjour</header>
        <div class="containerTitle"></div>
</head>
<body>
<header>
    <?php require_once('C:/wamp64/www/Banniere_Admin.php'); ?>
</header>
</body>
</html>





<footer>
    <div class= containerRetour>
        <form method='GET' action='deconnexion.php'>
    <br><br><button type="submit">Déconnexion</button></form>
</footer>