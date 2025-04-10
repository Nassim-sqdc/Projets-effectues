<?php require_once('C:\wamp64\www\BDD.php');
/*UPDATE `employes` SET `ID_employe`='[value-1]',`prenom`='[value-2]',`nom`='[value-3]',`droit`='[value-4]',`ID_SECTEUR`='[value-5]',`ID_QUALITE`='[value-6]',`id_acces`='[value-7]' WHERE 1*/


$sqlQuery = 'SELECT 
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



if (isset($_GET['id_acces']) && isset($_GET['prenom']) && isset($_GET['nom'])) 
    {
    $acces= $_GET['id_acces'];
    $prenom = $_GET['prenom'];
    $nom = $_GET['nom'];
    
    echo " Accès de " . $prenom . ' ' . $nom . ' : ' . $acces . '';
} else{
    echo "Erreur";
}




?>
 