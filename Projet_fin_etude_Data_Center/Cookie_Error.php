<?php 
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Redirection_Admin_Utilisateur.php');


echo "<h2>Cookie invalide";
?>
<footer><div><form method="GET" action="deconnexion.php">
            <button type="submit">Connexion</button>
        </form> </div>
        </footer>