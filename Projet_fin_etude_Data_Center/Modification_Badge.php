<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');

if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}
$sqlQuery = "SELECT
             badge.Id_Badge_Badge,
             badge.Date_Expiration_Badge, 
             badge.Numero_Badge,
             badge.utilisateur_id_utilisateur_utilisateur
             FROM badge";

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->execute();
$utilisateurs = $accesStatement->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>DataBase - Modification -</title>
</head>
<body> 
<header>
    <?php require_once('C:/wamp64/www/Banniere_Admin.php'); ?>
</header>

<!-------------Formulaire d'ajout d'un badge-------------------------->

<div class= container><p>Ajout du badge </p>
    <form action="MAJ_Badge_Ajout.php" method="POST" >
    <br>
    <label for="Id_Badge_Badge">Identifiant Badge :</label>
        <input type="number" id="Id_Badge_Badge" name="Id_Badge_Badge"required>
        

        <label for="Date_Expiration_Badge">Date d'expiration :</label>
        <input type="date" id="Date_Expiration_Badge" name="Date_Expiration_Badge"required>
        
   
        <label for="Numero_Badge">Numero du badge :</label>
        <input type="text" id="Numero_Badge" name="Numero_Badge"required>
        

        <label for="utilisateur_id_utilisateur_utilisateur">Identifiant de l'utilisateur relié au badge : </label>
        <input type="text" id="utilisateur_id_utilisateur_utilisateur" name="utilisateur_id_utilisateur_utilisateur"required>
        
    
        <button type="submit">Envoyer</button>
    </form>
</div>

<!-------------Formulaire de suppression d'un badge-------------------------->
<div class= container><p>Supprimer le badge </p>
    <form action="MAJ_Badge_Suppression.php" method="POST" >
    <br>
        <label for="Numero_Badge">Numero du badge :</label>
        <input type="text" id="Numero_Badge" name="Numero_Badge_BadgeS"required>
    
        <button type="submit">Envoyer</button>
    </form>
</div>
</body>
</html>

<footer>
    <div class= containerRetour>
        <form method='GET' action='Admin_interface.php'>
    <br><br><button type="submit">Retour</button></form>
</footer>