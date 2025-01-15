<?php
require_once '../config.php';
require_once '../dbconnection.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Falls nicht eingeloggt, zurück zur Login-Seite
    exit();
}

// Fehler- und Erfolgsmeldungen
$error = $success = "";
$id = $_SESSION['id'];

// Benutzerinformationen abrufen
$query = "SELECT firstname, lastname, email, username FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $firstname = $user['firstname'];
} else {
    die("Benutzer nicht gefunden.");
}

// Wenn das Formular abgesendet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_id = $_GET['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $hashed_password;

    // Validierung
    if (empty($username) || empty($email)) {
        $message = "Benutzername und E-Mail dürfen nicht leer sein.";
    } 

    $sql = "SELECT * FROM users WHERE id != '$current_id'";
    $result = $conn -> query($sql);
        
        while ($row = $result->fetch_array()) { 
            if ($row['username'] === $username) {
                
                $message = "Username existiert bereits"
                exit();
            }
        }
    if (!empty($old_password) && !empty($new_password)){
            
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        }
        else {
        // Daten in der Datenbank aktualisieren
        $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, username = ?, password = ? WHERE id = '$current_id'";
        $update_stmt = $conn->prepare($sql);
        $update_stmt->bind_param('sssss',  $firstname, $lastname, $email, $username, $hashed_password);

        if ($update_stmt->execute()) {
            $message = "Daten erfolgreich aktualisiert.";
            // Aktualisierte Werte in der Session speichern
            $_SESSION['username'] = $username;
        } else {
            $message = "Fehler beim Aktualisieren der Daten: " . $conn->error;
        }
    }
}
?>