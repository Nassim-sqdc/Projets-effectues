<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}
/*-----------------------------------Access to the user table---------------------------------*/
$sqlQuery = 'SELECT 
        user.ID_user,
        user.user_password,
        user.user_login,
        user.job_start,
        user.job_end,
        user.username,
        user.user_email,
        quality.ID_quality,
        enterprise.ID_enterprise,
        badge.ID_badge,
        badge.badge_number
    FROM 
        user
    LEFT JOIN enterprise
    ON user.ID_enterprise = enterprise.ID_enterprise
    LEFT JOIN badge
    ON user.badge_id_badge  = badge.ID_badge
    LEFT JOIN quality
    ON user.ID_Quality = quality.ID_quality';

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->execute();
?>
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>- User maintenance -</title>
</head>
<body>
<header> 
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?> 
</header> <div class="fixed-message">
<?php
      
      
      $sqlQueryLastuser = 'SELECT * 
      FROM `user` ORDER BY `ID_user` DESC LIMIT 1';
      $accesStatements = $mysqlClient->prepare($sqlQueryLastuser);
      $accesStatements->execute();
      $Lastuser = $accesStatements->fetchAll();
        
        if ((isset ($Lastuser[0]['ID_user'])))
    {   
        echo "Last ID user used  : " . htmlspecialchars($Lastuser[0]['ID_user']). '<br>';
        
    } 
    
    else {    
        echo "Missing data for this user";
    }
      
      ?>
</div>
<!------------------------------------Ajout d'un user------------------------------------------> 
    <div class= container>
        <strong><p><br><br>Creating a user : </p></strong>
        <form action="User_insertion.php" method="POST">
            <br><br>
        
        <label for="user_login">Login : </label>
        <input type="text" id="user_login" name="user_login"required>


        <label for="user_password">Password : </label>
        <input type="password" id="user_password" name="user_password"required>
        

        <label for="username">Name : </label>
        <input type="text" id="username" name="username"required>
        
        
        <label for="user_email">Mail : </label>
        <input type="text" id="user_email" name="user_email"required>

        <label for="job_start">Working hours start : </label>
        <input type="datetime-local" id="job_start" name="job_start"required>
       
        
        <label for="job_end">Working hours end : </label>
        <input type="datetime-local" id="job_end" name="job_end"required>
        
        <label for="ID_enterprise">Employee company ID : </label>
        <input type="text" id="ID_enterprise" name="ID_enterprise"required>
        

        <label for="badge_number"> Badge Number : </label>
        <input type="text" id="badge_number" name="badge_number" required>
        

        <label for="ID_Quality">Quality : </label>
        
        <input type="radio" id="Operator_add" name="Quality" value="1">
        <label for="Operator_add">Operator</label><br>

        <input type="radio" id="Client_add" name="Quality" value="2">
        <label for="Client_add">Client</label><br>

        <br><br>
    
        <button type="submit">Send</button>
        <br><br><br>

    </form>
<!-------------Formulaire de modification d'un user-------------------------->
<div class= container><p>Modify user properties :</p>
        <form action="User_Modification.php" method="POST" >
        
        <label for="user_login">Login :</label>
        <input type="text" id="user_login" name="user_login"required>


        <label for="user_password">password : </label>
        <input type="password" id="user_password" name="user_password"required>
        

        <label for="username">Name used :</label>
        <input type="text" id="username" name="username"required>
        
        
        <label for="user_email">Mail employee :</label>
        <input type="text" id="user_email" name="user_email"required>

        <label for="job_start">Working hours start :</label>
        <input type="datetime-local" id="job_start" name="job_start"required>
       
        
        <label for="job_end">Working hours end :</label>
        <input type="datetime-local" id="job_end" name="job_end"required>
        
        <label for="ID_enterprise">Employee company ID :</label>
        <input type="text" id="ID_enterprise" name="ID_enterprise"required>
        

        <label for="badge_number"> Badge number :</label>
        <input type="text" id="badge_number" name="badge_number" required>
        

        <label for="ID_Quality">Quality :</label>

        <input type="radio" id="Operator_mod" name="Quality" value="1">
        <label for="Operator_mod">Operator</label><br>

        <input type="radio" id="Client_mod" name="Quality" value="2">
        <label for="Client_mod">Client</label><br>


        <br><br>
    
        <button type="submit">Send</button>
    </form>
</div>
<!------------------------------------DELETE USER------------------------------------------>

    <div class= container>
    <strong><p>Deleting a user</p></strong>
           
        <form action="Delete_User.php" method="POST">
            <br><br>
        <label for="user_login">Login :</label>
        <input type="text" id="user_login" name="user_login"required>

        <button type="submit">Send</button>
    </form>
<footer>
    <div class= containerRetour>
        <form method='GET' action='Admin_interface.php'>
    <br><br><button type="submit">Back to </button></form>
</footer>