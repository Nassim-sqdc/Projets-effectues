<title>- Cookie Error -</title>
<?php 
session_start();
require_once('C:/wamp64/www/BDD_Connexion.php');
require_once('C:/wamp64/www/Admin_User_Redirection.php');


echo "<h2>Cookie invalid";
?>
<footer><div><form method="GET" action="Logout.php">
            <button type="submit">Connexion</button>
        </form> </div>
        </footer>