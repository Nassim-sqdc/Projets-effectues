<?php

session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');


/*------------------------------SQL user access--------------------------------------------*/
  
       $sqlQuery = 'SELECT 
        user.ID_user, 
        user.user_password, 
        user.user_login, 
        user.job_start, 
        user.job_end, 
        user.username,
        user.user_email, 
        enterprise.ID_enterprise,
        badge.ID_badge,
        quality.ID_quality
   FROM 
       user
   LEFT JOIN enterprise
   ON user.ID_enterprise = enterprise.ID_enterprise
   LEFT JOIN badge
   ON user.badge_id_badge = badge.ID_badge
   LEFT JOIN quality
   ON user.ID_quality = quality.ID_quality';
   
   $accesStatementBadge = $mysqlClient->prepare($sqlQuery);
   $accesStatementBadge->execute();
?>
<!-------------------------LOGIN FORM-------------------------------------------->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>Home</title>
</head>

<body> 
    
<div class= container>
        <form action="Admin_User_Redirection.php" method="POST">

    <label for="user_login">Login :</label>
        <input type="text" id="user_login" name="user_login"required>
        

        <label for="user_password">Password : </label>
        <input type="password" id="user_password" name="user_password"required>
    <button type="submit">Connexion</button>
</div>




</body>
</html>

