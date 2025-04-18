<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="flow.css">
        <title>- User insertion - </title>
    </head>
    <body> 
    <header>
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
</header>
<?php

if (isset($_POST['badge_number'])) {    
    $badge_number = $_POST['badge_number'];

    $sqlQuery = "SELECT ID_badge FROM badge WHERE badge_number = :badge";
    $accesStatement = $mysqlClient->prepare($sqlQuery);
    $accesStatement->bindParam(':badge', $badge_number);
    $accesStatement->execute();
    $badge = $accesStatement->fetch(PDO::FETCH_ASSOC);

    if ($badge) {
        $ID_badge = $badge['ID_badge']; // GET BADGE ID BY BADGE NUMBER

        /*--------------------------------Retrieving data sent from index.php------------------------------------*/

    if (isset($_POST['user_password']) && isset($_POST['user_login']) && isset($_POST['job_start'])&& isset($_POST['job_end'])
    && isset($_POST['username']) && isset($_POST['user_email']) && isset($_POST['ID_enterprise']) && isset($_POST['Quality'])) 
    {
        $password_Utilisateur = password_hash($_POST['user_password'], PASSWORD_BCRYPT);;
        $user_login = $_POST['user_login'];
        $job_start = $_POST['job_start'];
        $job_end = $_POST['job_end'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $ID_enterprise= $_POST['ID_enterprise'];
        $Quality = intval($_POST['Quality']);

        $QueryVerif = "SELECT * FROM user WHERE user_login = :user_login AND user_email = :user_email";
        $accesStatement = $mysqlClient->prepare($QueryVerif);
        $accesStatement->bindParam(':user_login',$user_login);
        $accesStatement->bindParam(':user_email', $user_email);
        $accesStatement -> execute();
        $UExisting = $accesStatement->fetch(PDO::FETCH_ASSOC);
/*---------------------------------------CHECK IF THE USER IS ALREADY IN THE DATABASE--------------------------------*/        
        if ($UExisting){
            echo "mail or the login already exists for a user in the data base";
        } 
/*---------------------------------------OTHERWISE IMPLEMENT THE USER--------------------------------*/   
        else {
             $sqlQuery = "INSERT INTO `user`(`user_password`, `user_login`, 
            `job_start`, `job_end`, `username`, 
            `user_email`, `ID_enterprise`, `badge_id_badge`, `ID_Quality`) 
        VALUES (:user_password, :user_login, 
            :job_start, :job_end, :username, 
            :user_email, :ID_enterprise, :badge_id, :Quality)";


            $accesStatement = $mysqlClient->prepare($sqlQuery);
            $accesStatement->bindParam(':user_password', $password_Utilisateur);
            $accesStatement->bindParam(':user_login',$user_login);
            $accesStatement->bindParam(':job_start', $job_start);
            $accesStatement->bindParam(':job_end', $job_end);
            $accesStatement->bindParam(':username', $username);
            $accesStatement->bindParam(':user_email', $user_email);
            $accesStatement->bindParam(':ID_enterprise', $ID_enterprise);
            $accesStatement->bindParam(':badge_id', $ID_badge);
            $accesStatement-> bindParam(':Quality', $Quality);;
            $accesStatement -> execute();

?> 
    <div class= container>
<?php 
     echo "<br>" . htmlspecialchars("insertion employee perform");
     echo ("<br> login : " . $user_login . '<br> job start : ' 
        . $job_start . '<br> job end : ' . $job_end . '<br> username : ' . $username . '<br> email : ' . $user_email . 
        '<br> ID enterprise : ' . $ID_enterprise . '<br> Quality : ' . $Quality . '<br>ID badge : ' . $ID_badge);


?>
<footer>
<div class= containerRetour>
<form method='GET' action='Admin_interface.php'>
<br><br><button type="submit">Back to</button></form>
</footer><?php


}       
/*---------------------------------------IF FORM BUG--------------------------------*/   

    } else {
    echo  "<br>" . htmlspecialchars("Data not sent");


?>
<footer>
<div class= containerRetour>
<form method='GET' action='Admin_interface.php'>
<br><br><button type="submit">Back to</button></form>
</footer>


<?php
    } 
}
    else {
        echo "<br>Badge not found.";


?>
<footer>
<div class= containerRetour>
<form method='GET' action='Admin_interface.php'>
<br><br><button type="submit">Back to</button></form>
</footer>

<?php
    }
}
?>