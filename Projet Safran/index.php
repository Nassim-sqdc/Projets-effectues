<strong><p>Interface php BDD</p></strong>

<?php

try { $mysqlClient = new PDO(
	'mysql:host=localhost;dbname=safran;charset=utf8',
	'root',
	''
);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}




$sqlQuery = 'SELECT
    employes.ID_employe,
    employes.prenom, 
    employes.nom, 
    acces.ID_ACCES
FROM 
    employes
LEFT JOIN 
    acces 
ON 
    employes.ID_employe = acces.ID_employe
GROUP BY 
employes.ID_employe';

$accesStatement = $mysqlClient->prepare($sqlQuery);
$accesStatement->execute();
$employes = $accesStatement->fetchAll();

?>
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Interface PHP BDD</title>
    <link rel="stylesheet" href="flow.css">

</head>
<body> <p>Ajout d'un employé</p>
<form action="Insertion.php" method="get">
     
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <br><br>

   
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br><br>

      
        <label for="droit">Droit</label>
        <input type="number" id="droit" name="droit" required>
        <br><br>

        <label for="secteur">SECTEUR</label>
        <input type="number" id="secteur" name="secteur" required>
        <br><br>

        <label for="qualité">Qualité</label>
        <input type="number" id="qualité" name="qualité" required>
        <br><br>

    
        <button type="submit">Envoyer</button>
    </form>
    


    


<p>Employés présents dans la BDD :</p>
 
    <?php 
 foreach ($employes as $employe){
    echo "<li>
    <form method='get' action='Acces.php'>
        <input type='hidden' name='prenom' value='" . $employe["prenom"] . "'>
        <input type='hidden' name='nom' value='" . $employe["nom"] . "'>
        <button type='submit' name='id_acces' value='" . $employe["ID_ACCES"] . "'>
            id : " . $employe["ID_employe"] . ', ' . $employe["prenom"] . ' ' . $employe["nom"] ."</button>
    </form>
  </li><br>";

}
?> 
    </body>
</html>