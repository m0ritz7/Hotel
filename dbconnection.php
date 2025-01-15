<?php

// 1. Datenbankverbindung herstellen
$host = "localhost"; // Hostname (z. B. localhost)
$dbname = "Hotel"; // Datenbankname
$db_user = "root"; // Datenbankbenutzer (Standard: root bei XAMPP)
$db_password = ""; // Datenbankpasswort (Standard: leer bei XAMPP)


$conn = new mysqli($host, $db_user, $db_password, $dbname);
