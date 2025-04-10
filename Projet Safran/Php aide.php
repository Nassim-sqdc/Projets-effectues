<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title> on est le <?php echo date ("d/m/Y, h:i:s"); ?></title>
    </head>
    <body>
    <p>PHP</p>
<?php 

$agerequis = 20;
$calculeage = 15 + 6;
$calculeage = 30-4;
$calculeage = 5/40;
$calculeage = 10*2;
$calculeage = 10*2*50;
$userage = ($calculeage - 981);
$anneemanquante= ($userage - $agerequis);
$id="antilope";

$isEnabled = ($userage === 20);

echo("Tu a {$userage} ans. Pseudo : {$id} <br><br><br>");

if ($isEnabled === true){
    echo "bienvenue {$id}, vous avez {$userage} ans aujourd'hui";
} elseif($isEnabled === false){
    echo "Personne veut de toi. L'age requis est de {$agerequis} ans et tu a {$userage} ans, ça fait quand même {$anneemanquante} année de différence";
}
?> <br><br><br>
<p><strong>Case test</strong></p>
<?php 
$age = 41;
echo ("tu as {$age} ans <br> <br>");
switch($age)
{
    case 0;
    echo("T'existe pas");
    break;

    case 20;
    echo ("Dans la fleur de l'age");
    break;

    case 32;
    echo("wooooow t'es abominablement vieux");
    break;

    case 41; 
    echo ("pourquoi tu me parle ? tu as besoin d'une machine respiratoire c'est ça ?");
    break;

    default;
    echo("franchement jsp quoi dire");
    break;
}
?> <br><br><br>

<strong><p>Film sans vergogne</p></strong>
<?php 
$tabfilm = [
    ["nom" => "La revanche des sith",
    "temps" => " 2h20",],
    
    ["nom" => "across the spiderverse",
    "temps"=> "2h16",],
];
$ligne = 2;
$count = 0;
while($count < $ligne)
{
    echo $tabfilm[$count] ["nom"]. " d'une durée de " . $tabfilm[$count] ["temps"]. '<br />';
    $count++;
}

?>
<strong><p>Tab associatif sans retenu</p></strong>
<?php 

$remastered = [
    ["spiderman : " , "spidersense <br>" ,true,],
    ["Mey : " , "quadragénairesense" ,true,],

];


for ($ligne = 0; $ligne <=1; $ligne++)
{
    echo $remastered[$ligne][0];
    echo $remastered[$ligne][1];

}

?>
<strong><p>foreach</p></strong>
<?php 

foreach ($remastered as $remastered){
    echo $remastered[0];
    echo $remastered[1];
}
?> <br><br><br>
<?php 

$recette = [
    "plat" => "pâte",
    "ingredient" =>"blé",
    "auteur" => "coubetchebest",
    "activite" => true,
    
     "plat" => "msemen",
    "ingredient" =>"Farine",
    "auteur" => "couzdetchebest",
    "activite" => false,
];
/*foreach($recette as $propriete => $value){
    echo $propriete . ' : ' . $value["plat"] . ' initié par ' . $value["auteur"] . '. <br />';
}*/

foreach($recette as $propriete => $value){
    echo $propriete . ' : ' . $value . '. <br /> ';
}
?> <strong><p>if array key exist</p></strong>
<?php
if (array_key_exists('plat', $recette))
{
    echo 'La clé "title" se trouve dans la recette ! <br>';
}

if (array_key_exists('commentaires', $recette))
{
    echo 'La clé "commentaires" se trouve dans la recette !';
} else {
    echo "La clé 'commentaires' n'existe pas <br>";
}

$users = [
    'Mathieu Nebra',
    'Mickaël Andrieu',
    'Laurène Castor',
];

if (in_array('Mathieu Nebra', $users))
{
    echo 'Ce bon vieux Mathieux fait bien partie des utilisateurs enregistrés ! <br>';
}

if (in_array('Arlette Chabot', $users))
{
    echo 'Arlette fait bien partie des utilisateurs enregistrés !';
} else {
    echo " Arlette ? ptdr c ki <br>";
}
$positionMathieu = array_search('Mathieu Nebra', $users);
echo '"Mathieu" se trouve en position ' . $positionMathieu . '<br> ';

$positionLaurène = array_search('Laurène Castor', $users);
echo '"Laurène" se trouve en position ' . $positionLaurène;

?>
<strong><p>PDO</p></strong>
<?php
try { $mysqlClient = new PDO(
	'mysql:host=localhost;dbname=safran;charset=utf8',
	'root',
	''
);
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

$sqlQuery = 'SELECT * FROM employes';
$employesStatement = $mysqlClient->prepare($sqlQuery);
$employesStatement->execute();
$employes = $employesStatement->fetchAll();

?> <p>Employée présent dans la table Safran :</p><?php
// On affiche chaque recette une à une
foreach ($employes as $employee) {

echo $employee["prenom"] . ' ' . $employee["nom"] . '<br>'; ?>
<?php } ?>
    </body>
</html>