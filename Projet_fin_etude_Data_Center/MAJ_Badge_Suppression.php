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
    <title>DataBase - Modification -</title>
</head>
<body>

<?php
/*-------------Récupération de la donnée envoyée depuis Modification_Badge.php--------------------------*/
if (isset($_POST['Numero_Badge_BadgeS'])) 
{
    $Numero_Badge_Badge = (int)$_POST['Numero_Badge_BadgeS'];
    
    $sqlQuery = "SELECT `Numero_Badge` 
    FROM `badge`
    WHERE Numero_Badge = :badge ";

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->bindParam(':badge', $Numero_Badge_Badge);
$accesStatement -> execute();
$Badge_Number = $accesStatement->fetchAll();
 
if ($Badge_Number){
    $mysqlClient->exec("SET FOREIGN_KEY_CHECKS = 0");
        $U_Badges = "UPDATE utilisateur 
                    SET badge_id_badge_badge = NULL 
                    WHERE badge_id_badge_badge = :badge";
    $accesStatement = $mysqlClient->prepare($U_Badges);
    $accesStatement->bindParam(':badge', $Numero_Badge_Badge);
    $accesStatement->execute();

    $sqlQueryNumber = "DELETE FROM `badge` 
                        WHERE badge.Numero_Badge = :badge ";
    $accesStatement = $mysqlClient->prepare($sqlQueryNumber);
    $accesStatement->bindParam(':badge', $Numero_Badge_Badge);
    $accesStatement->execute();

    $mysqlClient->exec("SET FOREIGN_KEY_CHECKS = 1");
    
    echo "Le badge n°" . $Numero_Badge_Badge . " à été supprimer avec succès <br> <br>";

} else {
    
    echo "Le numéro séléctionner ne correspond à aucun badge";
    
}
}

?>
</body>
<footer>
     <div class= containerRetour>
        <form method='GET' action='Modification_Badge.php'>
    <br><br><button type="submit">Retour</button></form>
</footer>