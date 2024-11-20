<?php
session_start(); // Session starten
session_unset(); // Alle Session-Daten löschen
session_destroy(); // Session zerstören
header("Location: login.php"); // Zurück zur Login-Seite
exit();
?>
