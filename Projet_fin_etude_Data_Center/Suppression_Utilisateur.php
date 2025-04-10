<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');

if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
} 
?><!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="flow.css">
        <title>DataBase</title>
    </head>
    <body>
    <header>
    <?php require_once('C:/wamp64/www/Banniere_Admin.php'); ?>
</header> 
<?php
/*-------------Récupération des données envoyée depuis Modification_Badge.php--------------------------*/
    if (isset($_POST['Login_Utilisateur']))
    {
        $Login_Utilisateur = htmlspecialchars(trim($_POST['Login_Utilisateur']));
        

        $QueryVerif = "SELECT * FROM utilisateur WHERE Login_Utilisateur = :Login_Utilisateur";
        $stmt = $mysqlClient->prepare($QueryVerif);
        $stmt->execute([
            ':Login_Utilisateur' => $Login_Utilisateur
        ]);
        $UExistant = $stmt->fetch(PDO::FETCH_ASSOC);
/*---------------------------------------VERIFIE SI UTILISATEUR DEJA PRESENT DANS LA BDD--------------------------------*/        
        if (!$UExistant){
            echo "cet utilisateur n'existe pas";
        } 
/*---------------------------------------SINON IMPLEMENTER L'UTILISATEUR--------------------------------*/   
        else {
             $sqlQuery = "DELETE FROM `utilisateur` WHERE Login_Utilisateur = :Login_Utilisateur";

            $accesStatement = $mysqlClient->prepare($sqlQuery);
            $accesStatement->bindParam(':Login_Utilisateur', $Login_Utilisateur);
            $accesStatement -> execute();

         ?> 
    <div class= container><?php 
     echo "<br>" . htmlspecialchars("Suppression de l'employé effectuer");
}       
/*---------------------------------------SI BUG DANS LE FORM--------------------------------*/   

    } else {
    echo  "<br>" . htmlspecialchars("Donnée non envoyée");
    }?> </div>
    </body>
    <footer>
     <div class= containerRetour>
        <form method='GET' action='Maintenance_Utilisateur.php'>
    <br><br><button type="submit">Retour</button></form></footer>