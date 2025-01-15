<?php
require_once '../config.php';
require_once '../dbconnection.php';

$error = ''; // Fehlermeldung initialisieren

// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Benutzer aus der Datenbank abrufen
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Überprüfen, ob der Benutzer inaktiv ist
            if ($user['status'] === 'inactive') {
                $error = 'Ihr Benutzerkonto ist inaktiv!';
            } elseif (password_verify($password, $user['password'])) {
                // Login erfolgreich
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: ../pages/welcome.php");
                exit;
            } else {
                // Passwort ist falsch
                $error = 'Benutzername oder Passwort ist falsch.';
            }
        } else {
            // Benutzername nicht gefunden
            $error = 'Benutzername oder Passwort ist falsch.';
        }
    } else {
        // Leere Eingabefelder
        $error = 'Bitte füllen Sie alle Felder aus.';
    }

    // Fehlermeldung in die Session speichern und zur Login-Seite weiterleiten
    $_SESSION['login_error'] = $error;
    header("Location: ../pages/login.php");
    exit;
}
?>
