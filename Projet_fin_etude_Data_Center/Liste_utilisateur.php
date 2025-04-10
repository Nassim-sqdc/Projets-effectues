<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}
/*-----------------------------------Récupération de la table Utilisateur--------------------------------------*/
$sqlQuery = 'SELECT
        utilisateur.Nom_Utilisateur_Utilisateur,
        qualite.Id_Qualite_Qualite,
        badge.Id_Badge_Badge,
        badge.Numero_Badge,
        qualite.Metier_Qualite
    FROM 
        utilisateur
    LEFT JOIN entreprise
    ON utilisateur.Id_Entreprise_Entreprise = entreprise.Id_Entreprise_Entreprise
    LEFT JOIN badge
    ON utilisateur.badge_id_badge_badge = badge.Id_Badge_Badge
    LEFT JOIN qualite
    ON utilisateur.Id_Qualite_Qualite = qualite.Id_Qualite_Qualite';

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->execute();
$utilisateurs = $accesStatement->fetchAll();

?>
<!-----------------------------------Liste utilisateur------------------------------->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>DataBase - Liste utilisateur -</title>
</head>
<body> 
<header>
    <?php require_once('C:/wamp64/www/Banniere_Admin.php'); ?>
</header>
    <div class= container> <strong><p>Liste D'utilisateur<br><br></p></strong>
    <?php 
    foreach ($utilisateurs as $utilisateur) {?>
    
    <br><br><li> 
    
    <?php
    $utilisateur['Nom_Utilisateur_Utilisateur'];
    $utilisateur['Id_Qualite_Qualite'];
    $utilisateur['Id_Badge_Badge'];

    if ((isset ($utilisateur["Nom_Utilisateur_Utilisateur"]) || $utilisateur["Id_Qualite_Qualite"]) || $utilisateur["Id_Badge_Badge"])
    {   
        echo " Nom : " . htmlspecialchars($utilisateur["Nom_Utilisateur_Utilisateur"]). '<br>';
        echo "Identifant du badge : " . htmlspecialchars($utilisateur['Id_Badge_Badge']) . "<br> ";
        echo "Numéro Badge : " . htmlspecialchars($utilisateur['Numero_Badge']) . "<br> ";
        echo "qualité : " . htmlspecialchars($utilisateur['Metier_Qualite']) . "<br><br>";
    } 
    
    else {    
        echo "Donnée manquante concernant cet utilisateur";
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
    <br><br><button type="submit">Retour</button></form>
</footer>