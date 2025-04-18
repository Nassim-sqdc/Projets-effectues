<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    require_once('C:/wamp64/www/BDD_Connexion.php');
    require_once('C:/wamp64/www/Admin_User_Redirection.php');

    if (!$_COOKIE["auto_login"]){
        header("Location: Cookie_Error.php");
        exit();
    }
?>

<link rel="stylesheet" href="flow.css">
<header>
<nav class="banniere">
    <a href="Admin_interface.php">Home</a>
</nav>
</header>