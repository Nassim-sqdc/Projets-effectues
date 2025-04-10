<?php 
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');

if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}


/*-------------Récupération des données envoyées depuis Modification_Badge.php--------------------------*/

if (isset($_POST['Id_Badge_Badge']) && isset($_POST['Date_Expiration_Badge']) && isset($_POST['Numero_Badge']) 
&& isset($_POST['utilisateur_id_utilisateur_utilisateur'])) 
{
    $Id_Badge_Badge= $_POST['Id_Badge_Badge'];
    $Date_Expiration_Badge = $_POST['Date_Expiration_Badge'];
    $Numero_Badge_Badge = $_POST['Numero_Badge'];
    $utilisateur_id_utilisateur_utilisateur = $_POST['utilisateur_id_utilisateur_utilisateur'];
    
    $sqlQuery = "INSERT INTO `badge`(`Id_Badge_Badge`,
         `Date_Expiration_Badge`, `Numero_Badge`,
        `utilisateur_id_utilisateur_utilisateur`) 
    VALUES (:Id_Badge_Badge,
         :Date_Expiration_Badge, :Numero_Badge_Badge,
        :utilisateur_id_utilisateur_utilisateur)";
$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->bindParam(':Id_Badge_Badge', $Id_Badge_Badge);
$accesStatement->bindParam(':Date_Expiration_Badge',  $Date_Expiration_Badge);
$accesStatement->bindParam(':Numero_Badge_Badge', $Numero_Badge_Badge);
$accesStatement->bindParam(':utilisateur_id_utilisateur_utilisateur', $utilisateur_id_utilisateur_utilisateur);
$accesStatement -> execute();

   echo "Ajout effectuer<br> <br>";
   echo ("<br> Date d'expiration : " . $Date_Expiration_Badge . '<br> Numero du badge : ' 
        . $Numero_Badge_Badge . '<br> id utilisateur : ' .$utilisateur_id_utilisateur_utilisateur);
} else {

    echo "Valeur non reçus";

}



?>
<footer>
     <div class= containerRetour>
        <form method='GET' action='Modification_Badge.php'>
    <br><br><button type="submit">Retour</button></form>
</footer>
