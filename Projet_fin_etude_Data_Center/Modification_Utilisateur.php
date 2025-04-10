<?php session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');      
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');

if (empty($_COOKIE["auto_login"])) {
    header("Location: Cookie_Error.php");
    exit();
}

    ?>
<!DOCTYPE html>
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

if (isset($_POST['ID_Utilisateur_Utilisateur']) && isset($_POST['Mot_de_passe']) && isset($_POST['Login_Utilisateur']) 
    && isset($_POST['Debut_Travaille_Utilisateur'])&& isset($_POST['Fin_Travaille_Utilisateur'])
    && isset($_POST['Nom_Utilisateur_Utilisateur']) && isset($_POST['Email_Utilisateur_Utilisateur']) 
    && isset($_POST['Id_Entreprise_Entreprise']) && isset($_POST['badge_id_badge_badge']) 
    && isset($_POST['Id_Qualite_Qualite'])) 
    {   
        $ID_Utilisateur_Utilisateur= $_POST['ID_Utilisateur_Utilisateur'];
        $Mot_de_passe_Utilisateur = password_hash($_POST['Mot_de_passe'], PASSWORD_BCRYPT);
        $Login_Utilisateur = $_POST['Login_Utilisateur'];
        $Debut_Travaille_Utilisateur = $_POST['Debut_Travaille_Utilisateur'];
        $Fin_Travaille_Utilisateur = $_POST['Fin_Travaille_Utilisateur'];
        $Nom_Utilisateur_Utilisateur = $_POST['Nom_Utilisateur_Utilisateur'];
        $Email_Utilisateur_Utilisateur = $_POST['Email_Utilisateur_Utilisateur'];
        $Id_Entreprise_Entreprise= $_POST['Id_Entreprise_Entreprise'];
        $badge_id_badge_badge= $_POST['badge_id_badge_badge'];
        $Id_Qualite_Qualite=$_POST['Id_Qualite_Qualite'];

        $sqlQuerys = "SELECT * FROM `utilisateur` 
            WHERE ID_Utilisateur_Utilisateur = :ID_Utilisateur_Utilisateur";
        $accesStatement = $mysqlClient->prepare($sqlQuerys);
            $accesStatement -> execute([':ID_Utilisateur_Utilisateur' => $ID_Utilisateur_Utilisateur]); 
            $Utilisateur = $accesStatement->fetchAll();  

if ($Utilisateur)
{   
    $sqlQuery = "UPDATE `utilisateur` 
            SET `ID_Utilisateur_Utilisateur`= :ID_Utilisateur_Utilisateur,
            `Login_Utilisateur`= :Login_Utilisateur,
            `Mot_de_passe`= :Mot_de_passe_Utilisateur,
            `Debut_Travaille`= :Debut_Travaille_Utilisateur,
            `Fin_Travaille_Utilisateur`= :Fin_Travaille_Utilisateur,
            `Nom_Utilisateur_Utilisateur`=:Nom_Utilisateur_Utilisateur,
            `Email_Utilisateur_Utilisateur`=:Email_Utilisateur_Utilisateur,
            `Id_Entreprise_Entreprise`= :Id_Entreprise_Entreprise,
            `badge_id_badge_badge`= :badge_id_badge_badge,
            `Id_Qualite_Qualite`=:Id_Qualite_Qualite
             WHERE utilisateur.ID_Utilisateur_Utilisateur = :ID_Utilisateur_Utilisateur";
   
   $accesStatement = $mysqlClient->prepare($sqlQuery);

   $accesStatement->bindParam(':Login_Utilisateur', $Login_Utilisateur);
   $accesStatement->bindParam(':Mot_de_passe_Utilisateur', $Mot_de_passe_Utilisateur);
   $accesStatement->bindParam(':Debut_Travaille_Utilisateur', $Debut_Travaille_Utilisateur);
   $accesStatement->bindParam(':Fin_Travaille_Utilisateur', $Fin_Travaille_Utilisateur);
   $accesStatement->bindParam(':Nom_Utilisateur_Utilisateur', $Nom_Utilisateur_Utilisateur);
   $accesStatement->bindParam(':Email_Utilisateur_Utilisateur', $Email_Utilisateur_Utilisateur);
   $accesStatement->bindParam(':Id_Entreprise_Entreprise', $Id_Entreprise_Entreprise);
   $accesStatement->bindParam(':badge_id_badge_badge', $badge_id_badge_badge);
   $accesStatement->bindParam(':Id_Qualite_Qualite', $Id_Qualite_Qualite);
   $accesStatement->bindParam(':ID_Utilisateur_Utilisateur', $ID_Utilisateur_Utilisateur);
   
   $accesStatement->execute();
   

   echo "Modification effectuer";
}


}else{ 
    echo "<br>Erreur : certains champs ne sont pas définis ou l'utilisateur n'existe pas dans la base.";

}


?>
</body>
<footer>
     <div class= containerRetour>
        <form method='GET' action='Maintenance_Utilisateur.php'>
    <br><br><button type="submit">Retour</button></form>
</footer>