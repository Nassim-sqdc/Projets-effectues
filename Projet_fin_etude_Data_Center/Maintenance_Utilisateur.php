<?php
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');
if (!$_COOKIE["auto_login"]){
    header("Location: Cookie_Error.php");
    exit();
}
/*-----------------------------------Accès à la table utilisateur---------------------------------*/
$sqlQuery = 'SELECT 
        utilisateur.ID_Utilisateur_Utilisateur,
        utilisateur.Mot_de_passe,
        utilisateur.Login_Utilisateur,
        utilisateur.Debut_Travaille,
        utilisateur.Fin_Travaille_Utilisateur,
        utilisateur.Nom_Utilisateur_Utilisateur,
        utilisateur.Email_Utilisateur_Utilisateur,
        qualite.Id_Qualite_Qualite,
        entreprise.Id_Entreprise_Entreprise,
        entreprise.Nom_entreprise_Entreprise,
        badge.Id_Badge_Badge
    FROM 
        utilisateur
    LEFT JOIN entreprise
    ON utilisateur.Id_Entreprise_Entreprise = entreprise.Id_Entreprise_Entreprise
    LEFT JOIN badge
    ON utilisateur.badge_id_badge_badge = badge.Id_Badge_Badge
    LEFT JOIN qualite
    ON utilisateur.Id_Qualite_Qualite = qualite.Id_Qualite_Qualite';

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->execute();
?>
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>DataBase - Maintenance utilisateur -</title>
</head>
<body>
<header>
    <?php require_once('C:/wamp64/www/Banniere_Admin.php'); ?>
</header>
<!------------------------------------Ajout d'un utilisateur------------------------------------------> 
    <div class= container>
        <strong><p>Création d'un utilisateur</p></strong>
        <form action="Insertion_Utilisateur.php" method="POST">
            <br><br>
    <label for="ID_Utilisateur_Utilisateur">Identifiant utilisateur :</label>
        <input type="number" id="ID_Utilisateur_Utilisateur" name="ID_Utilisateur_Utilisateur"required>
        
        <label for="Login_Utilisateur">Login :</label>
        <input type="text" id="Login_Utilisateur" name="Login_Utilisateur"required>


        <label for="Mot_de_passe">Mot de Passe : </label>
        <input type="password" id="Mot_de_passe" name="Mot_de_passe"required>
        

        <label for="Nom_Utilisateur_Utilisateur">Nom employé :</label>
        <input type="text" id="Nom_Utilisateur_Utilisateur" name="Nom_Utilisateur_Utilisateur"required>
        
        
        <label for="Email_Utilisateur_Utilisateur">Mail employé :</label>
        <input type="text" id="Email_Utilisateur_Utilisateur" name="Email_Utilisateur_Utilisateur"required>

        <label for="Debut_Travaille_Utilisateur">Horaire de commencement du travail : </label>
        <input type="time" id="Debut_Travaille_Utilisateur" name="Debut_Travaille_Utilisateur"required>
       
        
        <label for="Fin_Travaille_Utilisateur">Horaire de fin du travail : </label>
        <input type="time" id="Fin_Travaille_Utilisateur" name="Fin_Travaille_Utilisateur"required>
        
        <label for="Id_Entreprise_Entreprise">Id entreprise employé :</label>
        <input type="text" id="Id_Entreprise_Entreprise" name="Id_Entreprise_Entreprise"required>
        

        <label for="badge_id_badge_badge"> Identifiant du badge :</label>
        <input type="text" id="badge_id_badge_badge" name="badge_id_badge_badge" required>
        

        <label for="Id_Qualite_Qualite">Identifiant de la Qualité :</label>
        <input type="text" id="Id_Qualite_Qualite" name="Id_Qualite_Qualite"required>
        <br><br>
    
        <button type="submit">Envoyer</button>
        <br><br><br>

    </form>
<!-------------Formulaire de modification d'un utilisateur-------------------------->
<div class= container><p>Modifier les propriétés de l'utilisateur :</p>
        <form action="Modification_Utilisateur.php" method="POST" >

        <label for="ID_Utilisateur_Utilisateur">Identifiant utilisateur :</label>
        <input type="number" id="ID_Utilisateur_Utilisateur" name="ID_Utilisateur_Utilisateur"required>
        
        <label for="Login_Utilisateur">Login :</label>
        <input type="text" id="Login_Utilisateur" name="Login_Utilisateur"required>


        <label for="Mot_de_passe">Mot de Passe : </label>
        <input type="password" id="Mot_de_passe" name="Mot_de_passe"required>
        

        <label for="Nom_Utilisateur_Utilisateur">Nom employé :</label>
        <input type="text" id="Nom_Utilisateur_Utilisateur" name="Nom_Utilisateur_Utilisateur"required>
        
        
        <label for="Email_Utilisateur_Utilisateur">Mail employé :</label>
        <input type="text" id="Email_Utilisateur_Utilisateur" name="Email_Utilisateur_Utilisateur"required>

        <label for="Debut_Travaille_Utilisateur">Horaire de commencement du travail : </label>
        <input type="time" id="Debut_Travaille_Utilisateur" name="Debut_Travaille_Utilisateur"required>
       
        
        <label for="Fin_Travaille_Utilisateur">Horaire de fin du travail : </label>
        <input type="time" id="Fin_Travaille_Utilisateur" name="Fin_Travaille_Utilisateur"required>
        
        <label for="Id_Entreprise_Entreprise">Id entreprise employé :</label>
        <input type="text" id="Id_Entreprise_Entreprise" name="Id_Entreprise_Entreprise"required>
        

        <label for="badge_id_badge_badge"> Identifiant du badge :</label>
        <input type="text" id="badge_id_badge_badge" name="badge_id_badge_badge" required>
        

        <label for="Id_Qualite_Qualite">Identifiant de la Qualité :</label>
        <input type="text" id="Id_Qualite_Qualite" name="Id_Qualite_Qualite"required>
        <br><br>
    
        <button type="submit">Envoyer</button>
    </form>
</div>
<!------------------------------------SUPPRESSION UTILISATEUR------------------------------------------>

    <div class= container>
    <strong><p>Suppression d'un utilisateur</p></strong>
            <br><br>
        <form action="Suppression_Utilisateur.php" method="POST">
            <br><br>
        <label for="Login_Utilisateur">Login :</label>
        <input type="text" id="Login_Utilisateur" name="Login_Utilisateur"required>

        <button type="submit">Envoyer</button>
    </form>
<footer>
    <div class= containerRetour>
        <form method='GET' action='Admin_interface.php'>
    <br><br><button type="submit">Retour</button></form>
</footer>