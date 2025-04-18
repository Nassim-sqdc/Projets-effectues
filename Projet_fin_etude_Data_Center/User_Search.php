<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>- User Search -</title>
</head>
<body>
<header>
<?php require_once('C:/wamp64/www/Banner_Admin.php'); ?>
</header>
<?php


if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';

    $sqlSearch = "SELECT
        user.user_login,
        user.username,
        user.user_email,
        quality.ID_quality,
        badge.badge_number,
        quality.job_name,
        enterprise.name_enterprise
    FROM 
        user
    LEFT JOIN enterprise ON user.ID_Enterprise = enterprise.ID_enterprise
    LEFT JOIN badge ON user.badge_ID_badge = badge.ID_badge
    LEFT JOIN quality ON user.ID_Quality = quality.ID_quality
    WHERE user.username LIKE :search OR user.user_email LIKE :search OR user.user_login LIKE :search";

    $accesStatement = $mysqlClient->prepare($sqlSearch);
    $accesStatement->bindParam(':search', $search);
    $accesStatement->bindParam(':start', $start, PDO::PARAM_INT);
    $accesStatement->bindParam(':limit', $limit, PDO::PARAM_INT);
    $accesStatement->execute();

    $User_results = $accesStatement->fetchAll(PDO::FETCH_ASSOC);

    if ($User_results) {
        ?> <div class= container> 
            <br><br><li> <?php
        echo "<h3>Résultats :</h3>";
        foreach ($User_results as $user) {
            echo "Nom : " . htmlspecialchars($user['username']) . "<br>";
            echo "Email: " . htmlspecialchars($user['user_email']) . "<br>";
            echo "Login : " . htmlspecialchars($user['user_login']) . "<br>";
            echo "Badge : " . htmlspecialchars($user['badge_number']) . "<br>";
            echo "Permission : " . htmlspecialchars($user['job_name']) . "<br><br><br>";
        } ?> </li>
<br>
<?php
}
}
?>
</div>
<footer>
    <div class=containerRetour>
        <form method='GET' action='User_List.php'>
            <br><br><button type="submit">Back to</button>
        </form>
    </div>
</footer>
