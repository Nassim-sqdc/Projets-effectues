<?php try { $mysqlClient = new PDO(
	'mysql:host=localhost;dbname=safran;charset=utf8',
	'root',
	''
);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}





if (isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['droit']) && isset($_GET['secteur'])&& isset($_GET['qualité'])) 
{
    $Prenom=$_GET['prenom'];
    $Nom = $_GET['nom'];
    $Droit = $_GET['droit'];
    $Secteur = $_GET['secteur'];
    $Qualite = $_GET['qualité'];
    
    $sqlQuery = 'INSERT INTO employes (prenom, nom, droit, ID_SECTEUR, ID_QUALITE) 
                    VALUES (:prenom, :nom, :droit, :secteur, :qualite)';


$accesStatement = $mysqlClient->prepare($sqlQuery);

$accesStatement->execute([
        ':prenom'=>$Prenom,
        ':nom'=>$Nom,
        ':droit'=>$Droit,
        ':secteur'=>$Secteur,
        ':qualite'=>$Qualite
]);

    echo "Insertion employé effectuer<br> <br>";
    echo 'Prénom : ' . $Prenom . '<br> Nom : ' . $Nom . '<br> Droit : ' . $Droit . '<br> Secteur : ' .$Secteur . '<br> Qualité : ' . $Qualite;

    
}else{
   echo "Donnée non recus";
}