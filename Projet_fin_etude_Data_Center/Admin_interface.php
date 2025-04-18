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
        <title>- Admin interface -</title>
</head>
<body>  
<header>
    <?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
</header>

<div class="containerListe">
        <form method="GET" action="User_List.php">
            <button type="submit">User List</button>
        </form>
        <form method="GET" action="User_Maintenance.php">
            <button type="submit">User maintenance</button>
        </form>
        
        <form method="GET" action="Badge_Manage.php">
            <button type="submit">Badge manage</button>
        </form>
    </div>
</body>

<footer>
    <div class= containerRetour><form method="GET" action="Logout.php">
            <button type="submit">Logout</button>
        </form> </div>
</footer>