
<?php

session_start();
session_unset();
session_destroy();
setcookie('auto_login', NULL, -1);
    


header("Location: index.php");
exit();
?>
