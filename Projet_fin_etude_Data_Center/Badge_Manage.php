<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');

if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}
$sqlQuery = "SELECT
             badge.ID_badge,
             badge.date_expiration_badge, 
             badge.badge_number
             FROM `badge` ";

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->execute();
$utilisateurs = $accesStatement->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>- Badge manage -</title>
</head>
<body> 
<header>
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
</header><div class="fixed-message">
<?php
      
      
      $sqlQueryLastbadge = 'SELECT * 
      FROM `badge` ORDER BY `ID_badge` DESC LIMIT 1';
      $accesStatement = $mysqlClient->prepare($sqlQueryLastbadge);
      $accesStatement->execute();
      $Lastbadge = $accesStatement->fetchAll();
        
        if ((isset ($Lastbadge[0]['ID_badge'])))
    {   
        echo "Last badge ID in the database  : " . htmlspecialchars($Lastbadge[0]['ID_badge']). '<br>';
        
    } 
    
    else {    
        echo "Missing data for this user";
    }
      
      ?>
</span></div>

<!-------------Form for adding a badge-------------------------->

<div class= container><p>Add badge</p>
    <form action="Badge_Add.php" method="POST" >
    <br>
        

        <label for="date_expiration_badge">Expiry date :</label>
        <input type="date" id="date_expiration_badge" name="date_expiration_badge"required>
        
   
        <label for="badge_number">Badge number :</label>
        <input type="number" id="badge_number" name="badge_number"required>
        
    
        <button type="submit">Send</button>
    </form>
</div>

<!-------------Badge delet form-------------------------->
<div class= container><p>Delete badge </p>
    <form action="Badge_Suppression.php" method="POST" >
    <br>
        <label for="badge_number">Badge number :</label>
        <input type="number" id="badge_number" name="badge_number"required>
    
        <button type="submit">Send</button>
    </form>
</div>
</body>
</html>

<footer>
    <div class= containerRetour>
        <form method='GET' action='Admin_interface.php'>
    <br><br><button type="submit">Back to </button></form>
</footer>