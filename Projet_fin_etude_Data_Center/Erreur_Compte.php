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
    <title>Erreur</title>

<form method="GET" action="deconnexion.php" class="containerListe">
                        <button type="submit">Retour à la page de connexion</button> <span><?php echo "Connexion échouée, utilisateur ou mot de passe erroné" ?> </span>
                    </form>