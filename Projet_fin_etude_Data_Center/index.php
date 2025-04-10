<?php

session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');



/*------------------------------SQL d'accès utilisateur--------------------------------------------*/
  
       $sqlQuery = 'SELECT 
       utilisateur.ID_Utilisateur_Utilisateur,
       utilisateur.Mot_de_passe,
       utilisateur.Login_Utilisateur,
       utilisateur.Debut_Travaille,
       utilisateur.Fin_Travaille_Utilisateur,
       utilisateur.Nom_Utilisateur_Utilisateur,
       utilisateur.Email_Utilisateur_Utilisateur,
       entreprise.Id_Entreprise_Entreprise,
       badge.Id_Badge_Badge,
       qualite.Id_Qualite_Qualite
   FROM 
       utilisateur
   LEFT JOIN entreprise
   ON utilisateur.Id_Entreprise_Entreprise = entreprise.Id_Entreprise_Entreprise
   LEFT JOIN badge
   ON utilisateur.badge_id_badge_badge = badge.Id_Badge_Badge
   LEFT JOIN qualite
   ON utilisateur.Id_Qualite_Qualite = qualite.Id_Qualite_Qualite';
   
   $accesStatementBadge = $mysqlClient->prepare($sqlQuery);
   $accesStatementBadge->execute();
?>
<!-------------------------FORMULAIRE DE CONNEXION-------------------------------------------->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="flow.css">
    <title>Acceuil</title>
</head>

<body> 
  
<div class= container>
        <form action="Redirection_Admin_Utilisateur.php" method="POST">

    <label for="Login_Utilisateur">Identifiant Utilisateur :</label>
        <input type="text" id="Login_Utilisateur" name="Login_Utilisateur"required>
        

        <label for="Mot_de_passe">Mot de Passe : </label>
        <input type="password" id="Mot_de_passe" name="Mot_de_passe"required>
    <button type="submit">Connexion</button>
</div>




</body>
</html>

