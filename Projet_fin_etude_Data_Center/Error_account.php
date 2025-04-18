<?php 
require_once('C:/wamp64/www/BDD_Connexion.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>- Error -</title>

<form method="GET" action="Logout.php" class="containerListe">
                        <button type="submit">Back to login page</button> <span><?php echo "Login failed, wrong user or password" ?> </span>
                    </form>