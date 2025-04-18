<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');      
require_once('C:/wamp64/www/Admin_User_Redirection.php');

if (empty($_COOKIE["auto_login"])) {
    header("Location: Cookie_Error.php");
    exit();
}

if (isset($_POST['badge_number'])) {
    $badge_number = $_POST['badge_number'];

    $sqlQuery = "SELECT ID_badge FROM badge WHERE badge_number = :badge";
    $accesStatement = $mysqlClient->prepare($sqlQuery);
    $accesStatement->bindParam(':badge', $badge_number);
    $accesStatement->execute();
    $badge = $accesStatement->fetch(PDO::FETCH_ASSOC);

    if ($badge) {
        $ID_badge = $badge['ID_badge']; // GET BADGE ID

        if (isset($_POST['user_password']) && isset($_POST['user_login']) 
            && isset($_POST['job_start']) && isset($_POST['job_end'])
            && isset($_POST['username']) && isset($_POST['user_email']) 
            && isset($_POST['ID_enterprise']) && isset($_POST['badge_number']) 
            && isset($_POST['Quality'])) {
            
            // LOGIN OK ??
            if (!isset($_POST['user_login'])) {
                echo "login not recognised ";
                exit();
            }

            $password_user = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
            $user_login = $_POST['user_login'];
            $job_start = $_POST['job_start'];
            $job_end = $_POST['job_end'];
            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $ID_enterprise = $_POST['ID_enterprise'];
            $Quality = intval($_POST['Quality']);

            // CHECK IF USER EXIST
            $sqlQuerys = "SELECT * FROM `user` WHERE user_login = :user_login";
            $accesStatement = $mysqlClient->prepare($sqlQuerys);
            $accesStatement->execute([':user_login' => $user_login]);
            $user = $accesStatement->fetch(PDO::FETCH_ASSOC);

            if ($user) {   
                //UPDATE USER INFORMATION
                $sqlQuery = "UPDATE `user` 
                    SET
                    `user_login`= :user_login,
                    `user_password`= :user_password,
                    `job_start`= :job_start,
                    `job_end`= :job_end,
                    `username`= :username,
                    `user_email`= :user_email,
                    `ID_enterprise`= :ID_enterprise,
                    `badge_id_badge`= :badge_id, 
                    `ID_Quality`= :Quality
                    WHERE user_login = :user_login";

                $accesStatement = $mysqlClient->prepare($sqlQuery);
                $accesStatement->bindParam(':user_login', $user_login);
                $accesStatement->bindParam(':user_password', $password_user);
                $accesStatement->bindParam(':job_start', $job_start);
                $accesStatement->bindParam(':job_end', $job_end);
                $accesStatement->bindParam(':username', $username);
                $accesStatement->bindParam(':user_email', $user_email);
                $accesStatement->bindParam(':ID_enterprise', $ID_enterprise);
                $accesStatement->bindParam(':badge_id', $ID_badge); // Utilisation de l'ID du badge
                $accesStatement->bindParam(':Quality', $Quality);
                $accesStatement->execute();

                echo "Updated user !";
            } else {
                echo "<br> Data not sent";
            }
        }
    } else {
        echo "<br>Badge not found.";
    }
}
?>
