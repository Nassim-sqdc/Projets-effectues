<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}

/*--------------------------------Récupération des données envoyées depuis index.php------------------------------------*/

    if (isset($_POST['ID_Utilisateur_Utilisateur']) && isset($_POST['Mot_de_passe']) && isset($_POST['Login_Utilisateur']) && isset($_POST['Debut_Travaille_Utilisateur'])&& isset($_POST['Fin_Travaille_Utilisateur'])
    && isset($_POST['Nom_Utilisateur_Utilisateur']) && isset($_POST['Email_Utilisateur_Utilisateur']) && isset($_POST['Id_Entreprise_Entreprise']) && isset($_POST['badge_id_badge_badge']) && isset($_POST['Id_Qualite_Qualite'])) 
    {
        $ID_Utilisateur_Utilisateur= $_POST['ID_Utilisateur_Utilisateur'];
        $Mot_de_passe_Utilisateur = password_hash($_POST['Mot_de_passe'], PASSWORD_BCRYPT);;
        $Login_Utilisateur = $_POST['Login_Utilisateur'];
        $Debut_Travaille_Utilisateur = $_POST['Debut_Travaille_Utilisateur'];
        $Fin_Travaille_Utilisateur = $_POST['Fin_Travaille_Utilisateur'];
        $Nom_Utilisateur_Utilisateur = $_POST['Nom_Utilisateur_Utilisateur'];
        $Email_Utilisateur_Utilisateur = $_POST['Email_Utilisateur_Utilisateur'];
        $Id_Entreprise_Entreprise= $_POST['Id_Entreprise_Entreprise'];
        $badge_id_badge_badge= $_POST['badge_id_badge_badge'];
        $Id_Qualite_Qualite=$_POST['Id_Qualite_Qualite'];

        $QueryVerif = "SELECT * FROM utilisateur WHERE Login_Utilisateur = :Login_Utilisateur AND Email_Utilisateur_Utilisateur = :Email_Utilisateur_Utilisateur";
        $stmt = $mysqlClient->prepare($QueryVerif);
        $accesStatement = $mysqlClient->prepare($QueryVerif);
        $accesStatement->bindParam(':Login_Utilisateur',$Login_Utilisateur);
        $accesStatement->bindParam(':Email_Utilisateur_Utilisateur', $Email_Utilisateur_Utilisateur);
        $accesStatement -> execute();
        $UExistant = $accesStatement->fetch(PDO::FETCH_ASSOC);
/*---------------------------------------VERIFIE SI UTILISATEUR DEJA PRESENT DANS LA BDD--------------------------------*/        
        if ($UExistant){
            echo "cet utilisateur existe déjà";
        } 
/*---------------------------------------SINON IMPLEMENTER L'UTILISATEUR--------------------------------*/   
        else {
             $sqlQuery = "INSERT INTO `utilisateur`(`ID_Utilisateur_Utilisateur`,
            `Mot_de_passe`, `Login_Utilisateur`, 
            `Debut_Travaille`, `Fin_Travaille_Utilisateur`, `Nom_Utilisateur_Utilisateur`, 
            `Email_Utilisateur_Utilisateur`, `Id_Entreprise_Entreprise`, `badge_id_badge_badge`, `Id_Qualite_Qualite`) 
        VALUES (:ID_Utilisateur_Utilisateur,
            :Mot_de_passe, :Login_Utilisateur, 
            :Debut_Travaille, :Fin_Travaille_Utilisateur, :Nom_Utilisateur_Utilisateur, 
            :Email_Utilisateur_Utilisateur, :Id_Entreprise_Entreprise, :badge_id_badge_badge, :Id_Qualite_Qualite)";


            $accesStatement = $mysqlClient->prepare($sqlQuery);
            $accesStatement->bindParam(':ID_Utilisateur_Utilisateur',$ID_Utilisateur_Utilisateur);
            $accesStatement->bindParam(':Mot_de_passe', $Mot_de_passe_Utilisateur);
            $accesStatement->bindParam(':Login_Utilisateur',$Login_Utilisateur);
            $accesStatement->bindParam(':Debut_Travaille', $Debut_Travaille_Utilisateur);
            $accesStatement->bindParam(':Fin_Travaille_Utilisateur', $Fin_Travaille_Utilisateur);
            $accesStatement->bindParam(':Nom_Utilisateur_Utilisateur', $Nom_Utilisateur_Utilisateur);
            $accesStatement->bindParam(':Email_Utilisateur_Utilisateur', $Email_Utilisateur_Utilisateur);
            $accesStatement->bindParam(':Id_Entreprise_Entreprise', $Id_Entreprise_Entreprise);
            $accesStatement->bindParam(':badge_id_badge_badge', $badge_id_badge_badge);
            $accesStatement->bindParam(':Id_Qualite_Qualite', $Id_Qualite_Qualite);
            $accesStatement -> execute();

?> 

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="flow.css">
        <title>Data base</title>
    </head>
    <body> 
    <div class= container>
<?php 
     echo "<br>" . htmlspecialchars("insertion employé effectuer");
}       
/*---------------------------------------SI BUG DANS LE FORM--------------------------------*/   

    } else {
    echo  "<br>" . htmlspecialchars("Donnée non envoyée");
    }
?> </div>
    </body>
    <footer>
     <div class= containerRetour>
        <form method='GET' action='Maintenance_Utilisateur.php'>
    <br><br><button type="submit">Retour</button></form></footer>