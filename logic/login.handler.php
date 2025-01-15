<?php
require_once '../config.php';
require_once '../dbconnection.php';

// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Benutzer aus der Datenbank abrufen
        $query = "SELECT username, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Passwort überprüfen
            if (password_verify($password, $user['password'])) {

                // Login erfolgreich
                if($_SESSION['username'] = $user['username']){
                    header("Location: ../pages/welcome.php");
                    exit;
                } 
                if($_SESSION['role'] == 'admin'){
                    header("Location: ../pages/admin.menü.php");
                    exit;
                }
            }
        }
    }
}
?>
