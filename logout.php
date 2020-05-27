<script src="js/main.js"></script>
<?php
/*
function removeCookie($cookieName){
    unset($_COOKIE[$cookieName]);
    setcookie($cookieName, '', time() - 3600, '/');
}
removeCookie("auth");
removeCookie("isAdmin");
removeCookie("name");


session_unset();
session_destroy();
$_SESSION = array();
unset($_SESSION);
*/

setcookie("PHPSESSID", '', time() - 3600, '/');
echo "<script>redirect('login');</script>";
?>