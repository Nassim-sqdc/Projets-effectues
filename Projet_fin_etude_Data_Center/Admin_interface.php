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
        <title>Inteface Administrateur</title>
</head>
<body>  
<header>
    <?php require_once('C:/wamp64/www/Banniere_Admin.php'); ?>
</header>

<div class="containerListe">
        <form method="GET" action="Liste_utilisateur.php">
            <button type="submit">Liste des utilisateurs</button>
        </form>
        <form method="GET" action="Maintenance_Utilisateur.php">
            <button type="submit">Maintenance des utilisateurs</button>
        </form>
        
        <form method="GET" action="Modification_Badge.php">
            <button type="submit">Agencement de Badge</button>
        </form>
    </div>
</body>

<footer>
    <div class= containerRetour><form method="GET" action="deconnexion.php">
            <button type="submit">Déconnexion</button>
        </form> </div>
</footer>