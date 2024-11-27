<?php
// Session-Cookie-Parameter setzen (gültig bis Browser geschlossen wird)
session_set_cookie_params(0, "/", "", false, true);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
