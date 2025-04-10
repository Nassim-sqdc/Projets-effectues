<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>Data Base</title>
</head>
<body> 
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    require_once('C:/wamp64/www/BDD_Connexion.php');
    
}
/*-----------------------SI DONNÉES CORRESPONDANT A LA QUALITÉ ADMIN----------------------------------------------*/

if (isset($_POST['Login_Utilisateur']) && isset($_POST['Mot_de_passe'])) 
{
    $Mot_de_passe_Utilisateur = $_POST['Mot_de_passe'];
    $Login_Utilisateur = $_POST['Login_Utilisateur'];
    
    $sqlQueryAdmin = "SELECT 
    utilisateur.ID_Utilisateur_Utilisateur, 
    utilisateur.Mot_de_passe, 
    utilisateur.Login_Utilisateur, 
    utilisateur.Debut_Travaille, 
    utilisateur.Fin_Travaille_Utilisateur, 
    utilisateur.Nom_Utilisateur_Utilisateur, 
    utilisateur.Email_Utilisateur_Utilisateur, 
    utilisateur.Id_Entreprise_Entreprise, 
    utilisateur.badge_id_badge_badge, 
    utilisateur.Id_Qualite_Qualite 
        FROM `utilisateur`
        LEFT JOIN qualite ON utilisateur.Id_Qualite_Qualite = qualite.Id_Qualite_Qualite
        WHERE utilisateur.Login_Utilisateur = :Login AND utilisateur.Mot_de_passe = :password AND qualite.Id_Qualite_Qualite = 1";
$accesStatement = $mysqlClient->prepare($sqlQueryAdmin);
$accesStatement->bindParam(':Login', $Login_Utilisateur, PDO::PARAM_STR);
$accesStatement->bindParam(':password', $Mot_de_passe_Utilisateur, PDO::PARAM_STR);
$accesStatement->execute();
$AccesAdmin=$accesStatement->fetchAll(PDO::FETCH_ASSOC);

/*-----------------------SI DONNÉES CORRESPONDANT A LA QUALITÉ ADMIN----------------------------------------------*/

if ($AccesAdmin){
        $_SESSION['Admin_Utilisateur'] = $_POST['Login_Utilisateur'];
        //Création du cookie de connexion (valable 30 jours)
        $cookie_Nom = "auto_login";
        $cookie_Valeur = $Login_Utilisateur; // À remplacer par un identifiant utilisateur unique
        $expiry = time() + (30 * 24 * 60 * 60); // 30 jours en secondes


        setcookie(
            $cookie_Nom,
            $cookie_Valeur,
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

/*-----------------------SI DONNÉES CORRESPONDANT A LA QUALITÉ CLIENT----------------------------------------------*/

    if (isset($_POST['Login_Utilisateur']) && isset($_POST['Mot_de_passe'])) 
        {
            $Mot_de_passe_Utilisateur = $_POST['Mot_de_passe'];
            $Login_Utilisateur = $_POST['Login_Utilisateur'];
            
            $sqlQueryClient = "SELECT 
                utilisateur.ID_Utilisateur_Utilisateur, 
                utilisateur.Mot_de_passe, 
                utilisateur.Login_Utilisateur, 
                utilisateur.Debut_Travaille, 
                utilisateur.Fin_Travaille_Utilisateur, 
                utilisateur.Nom_Utilisateur_Utilisateur, 
                utilisateur.Email_Utilisateur_Utilisateur, 
                utilisateur.Id_Entreprise_Entreprise, 
                utilisateur.badge_id_badge_badge, 
                utilisateur.Id_Qualite_Qualite 
                        FROM `utilisateur`
                        LEFT JOIN qualite ON utilisateur.Id_Qualite_Qualite = qualite.Id_Qualite_Qualite
                        WHERE utilisateur.Login_Utilisateur = :Login AND utilisateur.Mot_de_passe = :password AND qualite.Id_Qualite_Qualite = 2";
            
            $accesStatement = $mysqlClient->prepare($sqlQueryClient);
            $accesStatement->bindParam(':Login', $Login_Utilisateur, PDO::PARAM_STR);
            $accesStatement->bindParam(':password', $Mot_de_passe_Utilisateur, PDO::PARAM_STR);
            $accesStatement->execute();
            $AccesUtilisateur=$accesStatement->fetchAll(PDO::FETCH_ASSOC);
            

    if ($AccesUtilisateur) {

                // 1. Création du cookie de connexion (valable 30 jours)
                $cookie_Nom = "auto_login";
                $cookie_Valeur= $Login_Utilisateur; // À remplacer par un identifiant utilisateur unique
                $expiry = time() + (30 * 24 * 60 * 60); // 30 jours en secondes

                setcookie(
                    $cookie_Nom,
                    $cookie_Valeur,
                    [
                        'expires' => $expiry,
                        'path' => '/',
                        'domain' => '', 
                        'secure' => true, 
                        'httponly' => true, 
                        'samesite' => 'Strict'
                    ]
                );
                header("Location: Utilisateur_interface.php");
                exit();

            }
        }
/*----------------------------------ERREUR DE CONNEXION------------------------------------------*/
if (!isset($_SESSION['Admin_Utilisateur']) && !isset($_SESSION['Client_Utilisateur'])) {
    header("Location: Erreur_Compte.php");
    exit();
} }
?>
</body>
</html>