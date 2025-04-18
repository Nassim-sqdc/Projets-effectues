<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
</head>
<body> 
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
}

require_once('C:/wamp64/www/BDD_Connexion.php');
/*-----------------------IF DATA CORRESPONDING TO ADMIN QUALITY----------------------------------------------*/

if (isset($_POST['user_login']) && isset($_POST['user_password'])) 
{
    $user_password = $_POST['user_password'];
    $user_login = strtolower(trim($_POST['user_login']));
    
    $sqlQueryAdmin = "SELECT 
    user.ID_user, 
    user.user_password, 
    user.user_login, 
    user.job_start, 
    user.job_end, 
    user.username,
    user.user_email, 
    user.ID_enterprise,
    user.badge_id_badge, 
    user.ID_Quality
        FROM `user`
        LEFT JOIN Quality ON user.ID_Quality= Quality.Id_Quality
        WHERE user.user_login = :Login AND Quality.ID_Quality= 1";
$accesStatement = $mysqlClient->prepare($sqlQueryAdmin);
$accesStatement->bindParam(':Login', $user_login, PDO::PARAM_STR);
$accesStatement->execute();
$AdminAcces=$accesStatement->fetch(PDO::FETCH_ASSOC);

/*-----------------------IF DATA CORRESPONDING TO ADMIN QUALITY----------------------------------------------*/

if ($AdminAcces && password_verify($user_password, $AdminAcces['user_password'])){
        $_SESSION['Admin_User'] = $_POST['user_login'];
        //Création du cookie de connexion (valable 30 jours)
        $cookie_Name = "auto_login";
        $cookie_Value = $user_login; // À remplacer par un identifiant user unique
        $expiry = time() + (30 * 24 * 60 * 60); // 30 jours en secondes


        setcookie(
            $cookie_Name,
            $cookie_Value,
            [
                'expires' => $expiry,
                'path' => '/',
                'domain' => '', // Set your domain
                'secure' => true, // Only over HTTPS
                'httponly' => true, // Not accessible via JS
                'samesite' => 'Strict' // CSRF protection
            ]
        );
        header("Location: Admin_interface.php");
        exit();
    }

/*-----------------------IF DATA CORRESPONDS TO CUSTOMER QUALITY----------------------------------------------*/

    if (isset($_POST['user_login']) && isset($_POST['user_password'])) 
        {
            $user_password = $_POST['user_password'];
            $user_login = strtolower(trim($_POST['user_login']));
            
            $sqlQueryClient = "SELECT 
                user.ID_user, 
                user.user_password, 
                user.user_login, 
                user.job_start, 
                user.job_end, 
                user.username,
                user.user_email, 
                user.ID_enterprise,
                user.badge_id_badge, 
                user.ID_Quality
                        FROM `user`
                        LEFT JOIN Quality ON user.ID_Quality= Quality.Id_Quality
                        WHERE user.user_login = :Login AND Quality.ID_Quality= 2";
            
            $accesStatement = $mysqlClient->prepare($sqlQueryClient);
            $accesStatement->bindParam(':Login', $user_login, PDO::PARAM_STR);
            $accesStatement->execute();
            $UserAcces=$accesStatement->fetch(PDO::FETCH_ASSOC);
            

    if ($UserAcces && password_verify($user_password, $UserAcces['user_password'])) {
                $_SESSION['UserAcces'] = $_POST['user_login'];
                // 1. Cookie création  (valable 30 days)
                $cookie_Name = "auto_login";
                $cookie_Value= $user_login; // À remplacer par un identifiant user unique
                $expiry = time() + (30 * 24 * 60 * 60); // 30 days in second

                setcookie(
                    $cookie_Name,
                    $cookie_Value,
                    [
                        'expires' => $expiry,
                        'path' => '/',
                        'domain' => '', 
                        'secure' => true, 
                        'httponly' => true, 
                        'samesite' => 'Strict'
                    ]
                );
                header("Location: User_interface.php");
                exit();

            }
        }
/*----------------------------------CONNECTION ERROR------------------------------------------*/
if (!isset($_SESSION['Admin_User']) && !isset($_SESSION['UserAcces'])) {
    header("Location: Error_account.php");
    exit();
} }
?>
</body>
</html>